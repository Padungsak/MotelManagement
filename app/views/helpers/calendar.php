<?php	 
/**
* Calendar Helper for CakePHP
*
* Copyright The-Di-Lab
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
*
* @author The-Di-Lab
* @copyright 2010 The-Di-Lab
* @link http://www.the-di-lab.com More Information
* @license http://www.opensource.org/licenses/mit-license.php The MIT License
*
*/
 
class CalendarHelper extends Helper
{
 
	var $helpers = array('Html', 'Form');
 
 
/**
* Generates a Calendar for the specified by the month and year params and populates it with the content of the data array
*
* @param $year string
* @param $month string
*
*/
 
	function show($month = null,$year = null)	{
		//day string
		$days_in_week= array('Su','Mo','Tu','We','Th','Fr','Sa');
		
		
		 //This gets today's date
		$date =time () ;
		
		//month, and year in seperate variables
		//use current month and year if they are not set
		$month = $month==null? date('m', $date):$month;
		$year  =  $year==null? date('Y', $date):$year;
		
		//Here we generate the first day of the month
		$first_day = mktime(0,0,0,$month, 1, $year) ;
		
		//This gets us the month name
		$title = date('F', $first_day) ; 

		//Here we find out what day of the week the first day of the month falls on
		$day_of_week = date('D', $first_day) ;
		
		//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
		switch($day_of_week){
		case "Sun": $blank = 0; break;
		case "Mon": $blank = 1; break;
		case "Tue": $blank = 2; break;
		case "Wed": $blank = 3; break;
		case "Thu": $blank = 4; break;
		case "Fri": $blank = 5; break;
		case "Sat": $blank = 6; break;
		}
		
		//how many days are in the current month	
		$days_in_month = cal_days_in_month(0, $month, $year) ; 
		
		
echo '<div id="datepicker" class="hasDatepicker">';
echo '<div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">';


		//building title
echo '<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">';
		echo $this->Html->link('<span class="ui-icon ui-icon-circle-triangle-w">Prev</span>',
								'/homes/index_nojs/'.($month==1?12:(intval($month)-1)).'/'.($month==1?(intval($year)-1):$year),
								array('class'=>'ui-datepicker-prev ui-corner-all',
									  'Title'=>'Prev',
									   'escape'=>false));		
									  
		echo $this->Html->link('<span class="ui-icon ui-icon-circle-triangle-e">Next</span>',
								'/homes/index_nojs/'.($month==12?1:(intval($month)+1)).'/'.($month==12?(intval($year)+1):$year),
								array('class'=>'ui-datepicker-next ui-corner-all',
									  'Title'=>'Next',
									  'escape'=>false));
		echo '<div class="ui-datepicker-title">';
		echo $title.' '.$year;
		echo '</div>';	
		
echo '</div>';

		//building the table heads
		echo "<table class='ui-datepicker-calendar'>";
		
		
		echo "<thead>";
		echo "<tr>";
		foreach($days_in_week as $dy){
			if($dy==$days_in_week[0]||$dy==$days_in_week[6]){
				echo '<th class="ui-datepicker-week-end">'.
				"<span>".$dy."<span>"
				.'</th>';
			}else{
				echo '<th>'.
				"<span>".$dy."<span>"
				.'</th>';
			}
			
		}		
		echo "<tr/>";
		echo "</thead>";
		
		
		//days in the week, up to 7
		$day_count = 1;
		
		echo "<tr>";
		//blank days
		while ( $blank > 0 ) {
			echo "<td>&nbsp;</td>";
			$blank = $blank-1;
			$day_count++;
		} 
		
		//sets the first day of the month to 1
		$day_num = 1;
		
		//count up the days, untill we've done all of them in the month
		while ( $day_num <= $days_in_month )
		{
			echo '<td><span class="ui-state-default">'.$this->content_in_cell($day_num,$month,$year).'</span></td>';
			$day_num++;
			$day_count++;
			
			//Make sure we start a new row every week
			if ($day_count > 7)
			{
			echo "</tr><tr>";
			$day_count = 1;
			}
		} 
		
		//Finaly we finish out the table with some blank details if needed
		while ( $day_count >1 && $day_count <=7 )
		{
		echo "<td>&nbsp; </td>";
		$day_count++;
		}
		
		echo "</tr></table>"; 
echo '</div>';
echo '</div>';
	}	


 /*
  * set content in each cell
  * @param $day string    1,2,3 /01,02,03 both format possible
  * @param $month string  1,2,3 /01,02,03 both format possible
  * @param $year string   2010,2012,2013
  * Currently it will show a submit button for all dates ahead today
  */
 function content_in_cell($day,$month,$year){
 			$day_format=$day;
		 	if(intval($day_format)<10){
		 		$day_format='0'.intval($day_format);
		 	}
		 	
		 	
		 	$month_format=$month;
		 	if(intval($month_format)<10){
		 		$month_format='0'.intval($month_format);
		 	}
		 	
		 	
		 	$cellDate=$month_format.'/'.$day_format.'/'.$year;
		 	
		 	//php only support this type of date format comparison
		 	$cCellDate= $year.'-'.$month_format.'-'.$day_format;
		 	$cTodayDate=date('Y-m-d') ;;
		 	
		 
		 	
		 	if($cCellDate>=$cTodayDate){
		 		return  $day.
		 				$this->Form->create('Room',array('url'=>'/rooms/index_nojs','id'=>'form')).
		 				$this->Form->submit('C',array('div'=>false,'style'=>'font-size:12px;')).
		 				$this->Form->hidden('date',array('id'=>'date','value'=>$cellDate)).
 						$this->Form->end();
		 	}else{
		 		return  $day;
		 	}
 }
 
 

}	
 
?>