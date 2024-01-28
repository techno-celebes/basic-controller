<?php

namespace TechnoCelebes\BasicController\MasterCont;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //tag
    //om upi
    private $css_data = array();
    private $js_data_begin = array();
    private $js_data_end = array();

    private $css_external_data = array();
    private $js_external_data = array();

    private $data_send;
    private $title;
    private $yet;
    private $s;

    public function __construct(){
        $this->set_data_send("body_class",array("noclasswhatsoever"));
        $this->set_data_send("title","My Ordinary Website");
        $this->set_data_send("css_data",$this->css_data);
        $this->set_data_send("js_data_begin",$this->js_data_begin);
        $this->set_data_send("js_data_end",$this->js_data_end);
        $this->set_data_send("css_external_data",$this->css_external_data);
        $this->set_data_send("js_external_data",$this->js_external_data);
    }

    public function get_css_data(){
        return $this->css_data;
    }

    public function get_js_data(){
        return $this->js_data;
    }

    public function get_css_external_data(){
        return $this->css_external_data;
    }

    public function get_js_external_data(){
        return $this->css_external_data;
    }

    public function get_data_send(){
        return $this->data_send;
    }

    public function set_data_send($n="",$data=array()){
        if(strlen($n)>0){
            $l = $this->get_data_send();
            $l[$n] = $data;
            $this->data_send = $l;
        }
    }

    public function set_array_data_send($data){
        foreach($data as $key => $value){
            if(strlen($key)>0){
                $l = $this->get_data_send();
                $l[$key] = $value;
                $this->data_send = $l;
            }
        }
    }

    public function set_css_data($data,$prefix="",$position="last"){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }
        if(empty($this->css_data)){
	        $this->css_data = $f_data;
        }else{
        	$p = $this->css_data;
	        if($position == "last"){
	            $merge = array_merge($p,$f_data);
	        }else{
	            $merge = array_merge($f_data,$p);
	        }

	        $this->css_data = $merge;
        }

        $this->data_send['css_data'] = $this->css_data;
    }

    public function set_js_data_begin($data,$prefix="",$position="last"){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        if(empty($this->js_data_begin)){
	        $this->js_data_begin = $f_data;
        }else{
	        if($position == "last"){
	            $merge = array_merge($this->js_data_begin,$f_data);
	        }else{
	            $merge = array_merge($f_data,$this->js_data_begin);
	        }

	        $this->js_data_begin = $merge;
        }

        $this->data_send['js_data_begin'] = $this->js_data_begin;
    }

    public function set_js_data_end($data,$prefix="",$position="last"){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        if(empty($this->js_data_end)){
	        $this->js_data_end = $f_data;
        }else{
	        if($position == "last"){
	            $merge = array_merge($this->js_data_end,$f_data);
	        }else{
	            $merge = array_merge($f_data,$this->js_data_end);
	        }

	        $this->js_data_end = $merge;
        }

        $this->data_send['js_data_end'] = $this->js_data_end;
    }

    public function set_css_external_data($data,$prefix="",$position="last"){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        if(empty($this->css_external_data)){
	        $this->css_external_data = $f_data;
        }else{
	        if($position == "last"){
	            $merge = array_merge($this->css_external_data,$f_data);
	        }else{
	            $merge = array_merge($f_data,$this->css_external_data);
	        }
	        
	       $this->css_external_data = $merge;
        }

        $this->data_send['css_external_data'] = $this->css_external_data;
    }

    public function set_js_external_data($data,$prefix="",$position="last"){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        if(empty($this->js_external_data)){
	        $this->js_external_data = $f_data;
        }else{
	        if($position == "last"){
	            $merge = array_merge($this->js_external_data,$f_data);
	        }else{
	            $merge = array_merge($f_data,$this->js_external_data);
	        }
	        
	        $this->js_external_data = $merge;
        }

        $this->data_send['js_external_data'] = $this->js_external_data;
    }

    public function return_view($view_name){
        /*
            m
        */
        return view($view_name,$this->get_data_send());
    }
}