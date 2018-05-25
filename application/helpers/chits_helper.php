<?php
/*Upload file and created the path**/
function rmkdir($path, $mode = 0755) {
	    $path = rtrim(preg_replace(array("/\\\\/", "/\/{2,}/"), "/", $path), "/");
	    $e = explode("/", ltrim($path, "/"));
	    if(substr($path, 0, 1) == "/") {
	        $e[0] = "/".$e[0];
	    }
	    $c = count($e);
	    $cp = $e[0];
	    for($i = 1; $i < $c; $i++) {
	    	$old_mask = umask(0);    	
	        if(!is_dir($cp) && !@mkdir($cp, $mode)) {        	
	            return false;
	        }
	        umask($old_mask);        
	        $cp .= "/".$e[$i];
	    }
    return @mkdir($path, $mode);
}
/**PAGE NATION**/
        function pagenation($limit,$total){
        	if(!isset($_REQUEST['page'])){
        		$_REQUEST['page'] = 1;
        	} 		
 		if($_REQUEST['page']){
			$page = $_REQUEST['page'];
			$cur_page = $page;
			$page -= 1;
			$per_page = $limit;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$start = $page * $per_page;			
			//$query_pag_data = $this->db->query($query." LIMIT $start, $per_page");
			//$result_pag_data = $query_pag_data->result();
			
			$msg = "";
			
			/* --------------------------------------------- */
			//$query_pag_data = $this->db->query($query);
			//$total = $query_pag_data->num_rows();
			$count = $total;
			$no_of_paginations = ceil($count / $per_page);
			
			/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
			if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
			$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
			} else {
			$end_loop = $no_of_paginations;
			}
			} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
			$end_loop = 7;
			else
			$end_loop = $no_of_paginations;
			}
			/* ----------------------------------------------------------------------------------------------------------- */
			$msg .= "<div class='pagination'><ul>";
			
			// FOR ENABLING THE FIRST BUTTON
			if ($first_btn && $cur_page > 1) {
			$msg .= "<li p='1' class='active'>First</li>";
			} else if ($first_btn) {
			$msg .= "<li p='1' class='inactive'>First</li>";
			}
			
			// FOR ENABLING THE PREVIOUS BUTTON
			if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$msg .= "<li p='$pre' class='active'>Previous</li>";
			} else if ($previous_btn) {
			$msg .= "<li class='inactive'>Previous</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
			if ($cur_page == $i)
			$msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
			else
			$msg .= "<li p='$i' class='active'>{$i}</li>";
			}
			
			// TO ENABLE THE NEXT BUTTON
			if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$msg .= "<li p='$nex' class='active'>Next</li>";
			} else if ($next_btn) {
			$msg .= "<li class='inactive'>Next</li>";
			}
			
			// TO ENABLE THE END BUTTON
			if ($last_btn && $cur_page < $no_of_paginations) {
			$msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
			} else if ($last_btn) {
			$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
			}
			$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:40px;width:30px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
			$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
			$msg = $msg . "</ul>" . $goto . $total_string . "</div>"; // Content for pagination
			//echo $msg;
			$msg = '<div id="container">'.$msg.'</div>';
			$page_result = array('pagination_view'=>$msg,'start'=>$start,'per_page'=>$per_page);
			return $page_result;
			} 
 	}