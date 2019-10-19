<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_skpd','M_cctv'));
		$this->load->library('Process');
	}
	
	
	public function kec($key)
	{
		$data['skpd']=$this->db->where(array('id' => $key,'status'=>1))->get('listsimpang')->row_array();
		if(!$data['skpd']){
			redirect($_SERVER['HTTP_REFERER']);
		}
		$where =array('id_simpang' => $key);
		$data['data']= $this->M_cctv->getData($where)->result();
		$data['content']="monitoring/kecamatan2";
		$this->load->view('template/layouts',$data);	
	}
	public function get_stream(){
	
        if(!($this->input->get('id_kamera'))){
			$status[]=array('status'=>'failed','link'=>"",'note'=>" CCTV is not online");
			echo json_encode($status);
echo 1;
            exit();
        }
	$id=$this->input->get('id_kamera');
        $cctv=$this->db->where(array('id'=>$id))->get('listkamera')->row_array();
        $timestamp = date('Y-m-d H:i:s');
        if($cctv){
            $rtsp=$cctv['url'];
            $filename="live/kamera_".$id."c";
            $filename2=$filename.".m3u8";
            $target="/home/servermojokerto/web/live/";
			$ip_publik="http://36.66.197.68:9000/index.php/monitoring/get_stream/?1_kamera=".$id;
            $command="timeout 10m ffmpeg -i $rtsp -fflags flush_packets -max_delay 1 -an -flags -global_header -s 640x320 -preset veryslow -maxrate 2M -bufsize 4M -c:v libx264 -hls_time 1 -hls_list_size 3 -hls_wrap 4 -segment_list_flags +live -hls_flags delete_segments ".$target.$filename2;
			$proces2 = new Process(false);
            $proces2->setCommand("rm -r ".$target.$filename."*");
            $process = new Process(false);
            $process->setCommand($command);
            $process->setPid($cctv['pid']);
            if ($process->status() && $cctv['pid']!=null && $cctv['last_stream']!=null){
                $diff=((float)time()-(float) $cctv['last_stream']);

                if($diff<=10*60){
                    $process->stop();   
                }else{
					$status=array('status'=>'success','link'=>base_url($filename2),'note'=>"playable");
					echo json_encode($status);
					exit();
				}
            }

			$proces2->start();
			$process->start();
			$newpid=$process->getPid();
			sleep(5);//wait

			if($process->status()){
				$urllink=($filename2);
				$this->db->where(array('id'=>$id))->update('listkamera', array('last_stream' => $timestamp,'pid'=>$newpid ,'url'=>$urllink,'url_server'=>$id_publik));
				$status=array('status'=>'success','link'=>base_url($filename2),'note'=>"playable");
echo 2;
				echo json_encode($status);
			}else{
				$status=array('status'=>'failed','link'=>"",'note'=>" CCTV is not online");
				echo json_encode($status);
echo 3;
			}
        }else{
			$status=array('status'=>'failed','link'=>"",'note'=>" CCTV is not online");
			echo json_encode($status);
echo 5;
		}
      
    }
}

/* End of file Monitoring.php */
/* Location: ./application/controllers/Monitoring.php */