<?php 

class Pagination {
	private $page_name;
	private $current_page;
	private $total_pages;
	private $showitems;
	private $output;
	private $options = array(
		'range' => 3,
		'posts_per_page' => 10,
		'text_first_page' => '&laquo;',
		'text_last_page' => '&raquo;',
		'text_next_page' => '&rsaquo;',
		'text_previous_page' => '&lsaquo;'
	);
	
	function __construct($page_name, 
						 $current_page, 
						 $total_posts, 
						 $options = array()){
		$this->options = $options + $this->options;
		$this->page_name = $page_name;
		$this->current_page = intval($current_page);
		$this->total_pages = ceil(($total_posts)/intval(5));//$this->options['posts_per_page']
		$this->showitems = ($this->options['range']*2)+1;
		$this->generateOutput();
		
		}
	
	function generateOutput(){
		
		if(1!=$this->total_pages){
			$this->output = "<div class='pagination'>";
			$this->output.= "<span>Page ".$this->current_page."sur ".
							$this->total_pages."</span>";
							
			if($this->options['text_first_page']){
				if($this->current_page > 2 && 
				   $this->current_page > $this->options['range'] + 1 &&
				   $this->showitems < $this->total_pages){
					   $this->output.= "<a href=".sprintf('.$this->page_name,1').">" .
					   $this->options['text_first_page']."</a>";
					   }
				}
				
			if( $this->options['text_previous_page'] ){
				if( $this->current_page > 1 && 
				$this->showitems < $this->total_pages){
					$this->output.= "<a href=".sprintf($this->page_name,
					$this->current_page - 1).">".
					$this->options['text_previous_page']."</a>";
					}
				
				}
				
			for( $i=1; $i <= $this->total_pages; $i++ ){
				if( ($i > $this->current_page - $this->options['range']
				&& $i < $this->current_page + $this->options['range'] ||
				$this->total_pages <= $this->showitems)){
					$this->output.= ($this->current_page == $i)?
					"<span class='current'>".$i."</span>":
					"<a href=".sprintf($this->page_name,$i)."class='inactive'>".$i."</a>";					}
				}
			
			if( $this->options['text_next_page']){
				if( $this->current_page < $this->total_pages - 1 &&
				$this->showitems < $this->total_pages){
					$this->output.= "<a href=".sprintf($this->page_name,
					$this->current_page + 1).">".
					$this->options['text_next_page']."</a>";
					}
				}
				
			if( $this->options['text_last_page'] ){
				if( $this->current_page < $this->total_pages - 1 &&
				$this->current_page + $this->options['range'] <
				$this->total_pages &&
				$this->showitems < $this->total_pages){
					$this->output.= "<a href=".sprintf($this->page_name,
					$this->total_pages).">".
					$this->options['text_last_page']."</a>";
					}
				}
			
			$this->output.= "</div>";
			
			}
			
		
		}
		
	function display(){
		echo $this->output;
		}
}
	
$p = new Pagination("Hello", 1, 10, [3, 10, '&laquo;', '&raquo;', '&rsaquo;', '&lsaquo;']);
?>
