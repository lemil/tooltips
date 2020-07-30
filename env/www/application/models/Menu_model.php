<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

        //private $table = 'menu';

        //
        public function __construct(){
                parent::__construct();
        }

        public function getBreadcrumb($title){
                $bc = array();
                $mnu = $this->getMenu('full')->items;
                $found = false;
                foreach ($mnu as $r) {
                        if(strtolower($r->type) == strtolower('row')){
                                //echo 'reset BC, Add ROW'; var_dump($r);
                                $bc = array();
                                $i = 0;
                                $bc[0] = $r;
                        }
                        if(strtolower($r->type) == strtolower('item')){
                                if(strtolower($r->title) == strtolower($title)){
                                        $found = true;
                                        $bc[1] = $r;
                                        break;
                                }
                        }
                }
                if($found){
                        return $bc;
                } else {
                        return array();
                }

        }

        public function getMenu($section ='full'){
                $json = '';
                $json .= '      {"items":[';
                if($section=='data' || $section=='full' ){
                $json .= '{"title":"Data","type":"row","href":"/menu/sub/data","icon":"/assets/icon/settings.png","target":"_self"},';
                $json .= '{"title":"Locations","type":"item","href":"/locations/manager","icon":"/assets/icon/map.png","target":"_self"},';
                $json .= '{"title":"Articles","type":"item","href":"/articles/manager","icon":"/assets/icon/page.png","target":"_self"},';
                $json .= '{"title":"Anchors","type":"item","href":"/anchors/manager","icon":"/assets/icon/anchor.png","target":"_self"},';
                }
                if($section=='api' || $section=='full'){
                $json .= '{"title":"Api","type":"row","href":"/menu/sub/api","icon":"/assets/icon/cloud.png","target":"_self"},';
                $json .= '{"title":"v1.0","type":"item","href":"/api","icon":"/assets/icon/plus.png","target":"_self"},';
                }
                if($section=='config' || $section=='full'){
                $json .= '{"title":"Access","type":"row","href":"/menu/sub/config","icon":"/assets/icon/gear.png","target":"_self"},';
                $json .= '{"title":"Users","type":"item","href":"/users/manager","icon":"/assets/icon/user.png","target":"_self"},';
                $json .= '{"title":"Roles","type":"item","href":"/roles/manager","icon":"/assets/icon/key.png","target":"_self"},';
                }
                if($section=='browse' || $section=='full'){
                $json .= '{"title":"Data Browser","type":"row","href":"/menu/sub/browse","icon":"/assets/icon/database.png","target":"_self"},';
                $json .= '{"title":"Browse","type":"item","href":"/browse","icon":"/assets/icon/browser.png","target":"_self"},';
                }
                $json = substr($json,0,-1);
                $json .= ']}';

                $data = json_decode($json);
                return $data;
        }

}
