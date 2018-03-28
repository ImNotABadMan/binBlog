<?php
/**
 * @Author: anchen
 * @Date:   2017-12-02 21:20:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-05 09:04:06
 */
namespace plugins;

class FileUploadTool{
    public static function fileUpload($file){
        $typeArr = array("image/jpeg", "iamge/jpg", "image/png", "image/gif");
        $str = "";

        $dirPath = ROOT_PUBLIC_PATH. "admin/images/{$GLOBALS["module"]}Images";

        if(!is_dir($dirPath)){
            mkdir($dirPath);
        }
        if(!in_array($file["type"], $typeArr)){
            return false;
        }

        $picName = uniqid("_blog_img") . date("YmdHis") . mt_rand(1, 1000) . strstr($file["name"], ".");
        $picPath = ROOT_PUBLIC_PATH . "admin/images/{$GLOBALS["module"]}Images/" . $picName;

        if(!move_uploaded_file($file["tmp_name"], $picPath)){
            return false;
        }

        return "public/admin/images/{$GLOBALS["module"]}Images/" . $picName;

    }
}