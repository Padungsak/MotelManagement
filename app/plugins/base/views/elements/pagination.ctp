    
<?php // Options
if (!empty($this->passedArgs)) {
	$paginator->options(array('url' => $this->passedArgs));
} ?>

<div class="pagination">
	<?php echo $paginator->counter(array('format' => __d('forum', 'Displaying %start%-%end% of %count%', true))); ?>

	<div class="pagingList">
		<?php // Paging 
        //echo $paginator->first('&laquo;', array('escape' => false));
        echo $paginator->numbers(array('separator' => ''));
        //echo $paginator->last('&raquo;', array('escape' => false)); 
        ?> 
	</div>
    
    <div>
    	<?php //Paging Navi
    	echo $paginator->prev('<< Previous ', null, null, array('class' => 'disabled'));
        echo $paginator->next(' Next >>', null, null, array('class' => 'disabled'));
    	?>
    </div>
	<div class="clear"><!-- --></div>
</div>
