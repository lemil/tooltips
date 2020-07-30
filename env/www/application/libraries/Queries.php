<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Queries {

    //Generic
    public function getGenericAll($table) {
        $out = "select * from $table p limit 1000";
        return $out;
    }

    public function getGenericById($table) 
    {   
        $out = "select * from $table p where id = ?";
        return $out; 
    }

    public function getGenericByFieldEquals($table,$field,$limit=0) 
    {   
        $out = "select * from $table where $field = ?";
        if($limit == 0){
        
        } else { 
            $out .= ' limit '.$limit;
         };
        return $out; 
    }

    public function getGenericByFieldLike($table,$field,$limit=0) 
    {   
        $out = "select * from $table where $field like ?";
        if($limit == 0){
        
        } else { 
            $out .= ' limit '.$limit;
         };
        return $out; 
    }


    public function toggleactiveGenericById($table) 
    {   
        $out = "update $table set active = IF(active=1, 0, 1) where id = ?";
        return $out; 
    }

    public function deleteGenericById($table) 
    {   
        $out = "delete from $table where id = ?";
        return $out; 
    }


    //Ttip
    public function updateTtip() 
    {   
        $out = 'update ttip   
                set  url=?, title=?, image=?, text=?, ts=CURRENT_TIMESTAMP 
                where id = ? ';
        return $out; 
    }

    //Location
    public function updateLocation() 
    {   
        $out = 'update location   
                set  userId=?, host=?, pattern=?, ts=CURRENT_TIMESTAMP 
                where id = ? ';
        return $out; 
    }

    public function getLocationByUsername($username) 
    {
        $out = "select * from location where userId in (select id from user where username like \'$username\' ";
        return $out; 
    } 


    public function getByLocationUserIdAndUrl() {
        $out = "select id locationId from location where userId = ? and host like ? and pattern like ? order by 1 ";
        return $out;   
    }


    //Anchor
    public function updateAnchor() 
    {   
        $out = 'update anchor   
                set  locationId=?, ttipId=?, selector=?, ts=CURRENT_TIMESTAMP 
                where id = ? ';
        return $out; 
    }

    //User
    public function updateUser() 
    {   
        $out = 'update user   
                set  username=?, token=?, ts=CURRENT_TIMESTAMP 
                where id=? ';
        return $out; 
    }

    public function updatePassword() 
    {   
        $out = 'update user   
                set  passHash=?, ts=CURRENT_TIMESTAMP 
                where id=? ';
        return $out; 
    }

    public function checkUserPass() {
             $out = "select count(1) cant from user where username=? and passHash=? and id in (select userid from role where role in ('backend','admin') )";
        return $out;    
    }



    public function isTokenValid() {
        $out = 'select count(1) cant from user where username like ? and token like ? ';
        return $out;
    }

    public function setToken() {
        $out = 'update user set token = ? where username like ? ';
        return $out;
    }

    //Role
    public function deleteRoleByPk(){
        return 'delete from role where userId = ? and role like ? ';
    }


    //Api.          
    public function getActiveLocationsByUserHostPattern(){
        $s  = '';
        $s .= 'select            ';
        $s .= '  a.id,     ';
        $s .= '  a.postId, ';
        $s .= '  n.selector,  ';
        $s .= '  n.layout,    ';
        $s .= '  n.cssclass,     ';
        $s .= '  n.cssstyle, ';
        $s .= '  a.url,   ';
        $s .= '  a.title, ';
        $s .= '  a.image, ';
        $s .= '  a.text   ';
        $s .= '  from location l ';
        $s .= '  left outer join anchor n '; 
        $s .= '   on l.id = n.locationId ';
        $s .= '  left outer join article a '; 
        $s .= '   on l.userId = a.userId ';
        $s .= '   and n.articleId = a.id ';
        $s .= '  where l.userId = ? ';
        $s .= '   and l.host like ? ';
        $s .= '   and l.pattern like ? ';
        $s .= '   and l.active = 1 ';
        $s .= '   and a.active = 1 ';
        $s .= '   and n.active = 1 ';
        return $s;
    }





}
?>