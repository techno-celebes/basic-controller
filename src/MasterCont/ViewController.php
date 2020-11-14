<?php

namespace TechnoCelebes\BasicController\MasterCont;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    private $css_data;
    private $js_data;
    private $data_send;
    private $title;

    public function __construct(){
        $this->set_data_send("title","My Ordinary Website");
    }

    public function get_css_data(){
        return $this->css_data;
    }

    public function get_js_data(){
        return $this->js_data;
    }

    public function get_data_send(){
        return $this->data_send;
    }

    public function set_data_send($n="",$data){
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

    public function set_css_data($data,$prefix=""){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        $this->css_data = $f_data;
        $this->data_send['css_data'] = $this->css_data;
    }

    public function set_js_data($data,$prefix=""){
        $f_data = array();
        if(strlen($prefix)>=1){
            foreach($data as $rep_data){
                $rep_data = $prefix . $rep_data;
                $f_data[] = $rep_data;
            }
        }else{
            $f_data = $data;
        }

        $this->js_data = $f_data;
        $this->data_send['js_data'] = $this->js_data;
    }

    public function combine_css($data,$position="last"){
        if(is_array($data)){
            if($position == "last"){
                $merge = array_merge($this->css_data,$data);
            }else{
                $merge = array_merge($data,$this->css_data);
            }
            $this->set_css_data($merge);
        }else{
            if($position == "last"){
                array_push($this->css_data,$data);
                $this->set_css_data($this->css_data);
            }else{
                array_unshift($this->css_data, $data);
                $this->set_css_data($this->css_data);
            }
        }
    }

    public function combine_js($data,$position="last"){
        if(is_array($data)){
            if($position == "last"){
                $merge = array_merge($this->js_data,$data);
            }else{
                $merge = array_merge($data,$this->js_data);
            }
            $this->set_js_data($merge);
        }else{
            if($position == "last"){
                array_push($this->js_data,$data);
                $this->data_send['js_data'] = $this->js_data;
            }else{
                array_unshift($this->js_data, $data);
                $this->data_send['js_data'] = $this->js_data;
            }
            $this->set_js_data($this->js_data);
        }
    }

    public function return_view($view_name){
        /*
            m
        */
        return view($view_name,$this->get_data_send());
    }
}