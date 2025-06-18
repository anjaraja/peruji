<?php
namespace App\Helpers;

class Pagination{
	public static function ClearObject($pagination){
        unset($pagination["first_page_url"]);
        unset($pagination["last_page_url"]);
        unset($pagination["links"]);
        unset($pagination["next_page_url"]);
        unset($pagination["path"]);
        unset($pagination["prev_page_url"]);
        unset($pagination["to"]);

        return $pagination;
	}
}