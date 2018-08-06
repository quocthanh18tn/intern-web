<!--
 - - - - -
fucntion calculation total employee's work
author : Thanh and Bao
create 17-7-2018

 - - - -
add function calculation overtime employee's work
author: thanh dep trai and bao con cho
create 18-7-2018



-->
<!--  -->

<?php
include "../connection.php";
?>
<?php
// function tinh thoi gian chuyen viec cua 1 ca nhan nao do qua cong viec khac

function chuyenviec($start,$finish)

{
	$Start=$start;
	$Finish=$finish;
	// echo "$start and $finish";
	$start=strtotime($Start);			//chuyen string thanh typedef time int
	$start__=strtotime($Start);
	$start=getdate($start);			//array [hours,minus,seconds,day,mon,year]
	$start_year=$start['year'];
	$start_mon=$start['mon'];
	$start_day=$start['mday']; //ngay
	$start_hours=$start['hours'];
	$start_minus=$start['minutes'];
	$start_nameday=$start['weekday'];
	$start_his="$start_hours:$start_minus:00";
	// echo $date1_nameday;
	$finish=strtotime($Finish);
	$finish__=strtotime($Finish);
	$finish=getdate($finish);
	//$date__2=strtotime($finish);

	$finish_year=$finish['year'];
	$finish_mon=$finish['mon'];
	$finish_day=$finish['mday']; //ngay
	$finish_hours=$finish['hours'];
	$finish_minus=$finish['minutes'];
	$finish_nameday=$finish['weekday'];



	$temp=$finish_hours;
	$exchangetime=0;
	if ( $start_day != $finish_day)

		{	$temp=23;
			$finish_hours+=24;
		}
	$finish_his="$temp:$finish_minus:00";

			if (strtotime($start_his) <= strtotime("10:00:00"))
			{
				if ( strtotime($finish_his)<= strtotime("10:00:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("12:00:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("15:00:00") )
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -45;
				elseif (strtotime($finish_his)<= strtotime("16:45:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -45;
				elseif (strtotime($finish_his)<= strtotime("17:15:00"))
					$exchangetime=(16 - $start_hours)*60 + (45 - $start_minus) -45;
				else
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -75;
			}
			elseif (strtotime($start_his) <= strtotime("12:00:00"))
			{
				if ( strtotime($finish_his)<= strtotime("12:00:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("15:00:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -45;
				elseif (strtotime($finish_his)<= strtotime("16:45:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -45;
				elseif (strtotime($finish_his)<= strtotime("17:15:00"))
				 $exchangetime=(16 - $start_hours)*60 + (45 - $start_minus) -45;
				else
				 $exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -75;
			}
			elseif (strtotime($start_his) <= strtotime("15:00:00"))
			{
				if (strtotime($finish_his)<= strtotime("15:00:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("16:45:00"))
					$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("17:15:00"))
				 $exchangetime=(16 - $start_hours)*60 + (45 - $start_minus) ;
				else $exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) -30;
			}
			elseif (strtotime($start_his) <= strtotime("16:45:00"))
			{
				if (strtotime($finish_his)<= strtotime("16:45:00"))
				$exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;
				elseif (strtotime($finish_his)<= strtotime("17:15:00"))
				 $exchangetime=(16 - $start_hours)*60 + (45 - $start_minus) ;
				else $exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus)-30 ;
			}
			elseif (strtotime($start_his)<= strtotime("17:15:00"))
			  	{
			  		if (strtotime($finish_his)<= strtotime("17:15:00"))
			  		$exchangetime=0 ;
				else $exchangetime=($finish_hours - 17)*60 + ($finish_minus - 15) ;
				}
			else $exchangetime=($finish_hours - $start_hours)*60 + ($finish_minus - $start_minus) ;



	return $exchangetime;
}


// function tinh thoi gian lam trong gio hanh chinh
function hanhchinh($start,$finish)

{
	$Start=$start;  //time ngay 1
	$Finish=$finish;  //time ngay 2
	//echo "$Start va $Finish <br>";
	$date_1=strtotime($Start);			//chuyen string thanh typedef time int
	$date_1=getdate($date_1);			//array [hours,minus,seconds,day,mon,year]
	$date__1=strtotime($Start);
	$date1_year=$date_1['year'];
	$date1_mon=$date_1['mon'];
	$date1_day=$date_1['mday']; //ngay
	$date1_hours=$date_1['hours'];
	$date1_minus=$date_1['minutes'];
	$date1_nameday=$date_1['weekday'];
	$date1_his="$date1_hours:$date1_minus:00";

	// echo $date1_nameday;
	$date_2=strtotime($Finish);
	$date__2=strtotime($Finish);
	$date_2=getdate($date_2);

	$date2_year=$date_2['year'];
	$date2_mon=$date_2['mon'];
	$date2_day=$date_2['mday']; //ngay
	$date2_hours=$date_2['hours'];
	$date2_minus=$date_2['minutes'];
	$date2_nameday=$date_2['weekday'];
	$date2_his="$date2_hours:$date2_minus:00";

			// check if finish = sunday then finish = saturday 16:45, and time remain save overtime
			// because if finish = sunday, time total = finish(sunday) + overtime(sunday) -> double time sunday, so assign finish = saturday
	 if ($date2_nameday =='Sunday')
	 {
		$date__2=strtotime("$date2_year-$date2_mon-$date2_day 16:45:00") -86400;
		$date_2=getdate($date__2);
		$date2_year=$date_2['year'];
		$date2_mon=$date_2['mon'];
		$date2_day=$date_2['mday']; //ngay
		$date2_hours=$date_2['hours'];
		$date2_minus=$date_2['minutes'];
		$date2_nameday=$date_2['weekday'];
		$date2_his="$date2_hours:$date2_minus:00";

		//echo "$date2_year $date2_mon $date2_day $date2_hours $date2_minus";
	 }
	 	else
	 	{
	 		if (strtotime($date2_his)>strtotime("16:45:00"))
	 		{
	 			$date__2=strtotime("$date2_year-$date2_mon-$date2_day 16:45:00") ;
				$date_2=getdate($date__2);
				$date2_year=$date_2['year'];
				$date2_mon=$date_2['mon'];
				$date2_day=$date_2['mday']; //ngay
				$date2_hours=$date_2['hours'];
				$date2_minus=$date_2['minutes'];
				$date2_nameday=$date_2['weekday'];
				$date2_his="$date2_hours:$date2_minus:00";

	 		}
	 	}


	 if ($date1_nameday =='Sunday')
	 {
		$date__1=strtotime("$date1_year-$date1_mon-$date1_day 16:45:00") -86400;
		$date_1=getdate($date__1);
		$date1_year=$date_1['year'];
		$date1_mon=$date_1['mon'];
		$date1_day=$date_1['mday']; //ngay
		$date1_hours=$date_1['hours'];
		$date1_minus=$date_1['minutes'];
		$date1_nameday=$date_1['weekday'];
		$date1_his="$date1_hours:$date1_minus:00";

		//echo "$date1_year $date1_mon $date1_day $date1_hours $date1_minus";
	 }
	 // start not sunday
	 else //start from 2 to 7
	 {
	 	if (23>=$date1_hours and strtotime($date1_his)>strtotime("16:45:00"))
	 		{
	 			$date__1=strtotime("$date1_year-$date1_mon-$date1_day 16:45:00") ;
				$date_1=getdate($date__1);
				$date1_year=$date_1['year'];
				$date1_mon=$date_1['mon'];
				$date1_day=$date_1['mday']; //ngay
				$date1_hours=$date_1['hours'];
				$date1_minus=$date_1['minutes'];
				$date1_nameday=$date_1['weekday'];
				$date1_his="$date1_hours:$date1_minus:00";
	 		}
	 	elseif (0<= $date1_hours && $date1_hours <8 )
	 		{
	 			$date__1=strtotime("$date1_year-$date1_mon-$date1_day 16:45:00")- 86400 ;
				$date_1=getdate($date__1);
				$date1_year=$date_1['year'];
				$date1_mon=$date_1['mon'];
				$date1_day=$date_1['mday']; //ngay
				$date1_hours=$date_1['hours'];
				$date1_minus=$date_1['minutes'];
				$date1_nameday=$date_1['weekday'];
				$date1_his="$date1_hours:$date1_minus:00";

	 		}
	 }
	 // day total to run argilothm
	$daytotal=round(($date__2 - $date__1)/86400); //
		//variable
	$totaltime=0;
	$flag_temp=0;
	$day_sunday=0;
	//check if start and create sunday variable
	// because if finish - start > sunday -start, then next week, so total time - sunday
	// and in week, no happen
	switch ($date1_nameday) {
		case 'Monday':
			$day_sunday=$date__1+6*86400; // 6 = day, convert to seconds ( *864000)
			$day_sunday=date("d-m-Y H:i:s",$day_sunday); //format day
			break;
		case 'Tuesday':
			$day_sunday=$date__1+5*86400;
			$day_sunday=date("d-m-Y H:i:s",$day_sunday);
			break;
		case 'Wednesday':
			$day_sunday=$date__1+4*86400;
			$day_sunday=date("d-m-Y H:i:s",$day_sunday);
			break;
		case 'Thursday':
			$day_sunday=$date__1+3*86400;
			$day_sunday=date("d-m-Y H:i:s",$day_sunday);
			break;
		case 'Friday':
			$day_sunday=$date__1+2*86400;
			$day_sunday=date("d-m-Y H:i:s",$day_sunday);
			break;
		case 'Saturday':
			$day_sunday=$date__1+1*86400;
			$day_sunday=date("d-m-Y H:i:s",$day_sunday);
			//$totaltime+=27000;
			//echo $day_sunday;
			break;

	}

	// if( ( (strtotime("$date2_year-$date2_mon-$date2_day") - strtotime("$date1_year-$date1_mon-$date1_day")) >0 ) && $daytotal==0)
	// 	$daytotal+=1;
	//echo " ngay total $daytotal <br>";
	// if daytotal >0 , finish > start , totaltime like that:
	$temp=$daytotal;
	while (! ($temp<0))
	{
		if ( $temp>0)
		{
			$totaltime+=strtotime("16:45:00")-strtotime("8:00:00");
		}
		if ($temp==0)
			$totaltime+=strtotime("$date2_hours:$date2_minus:00")-strtotime("$date1_hours:$date1_minus:00");
		$temp -=1;
	}
	//break time calculation
	while ( !($daytotal<0))
	{
		if ( $daytotal>0)
		{
			if ( strtotime($date1_his) <= strtotime("10:00:00") )
				$flag_temp+=45*60;

			elseif (strtotime($date1_his) <= strtotime("12:00:00") )

				$flag_temp+=45*60;

			elseif ( strtotime($date1_his) <= strtotime("15:00:00"))

				$flag_temp+=0*60;

			else

				$flag_temp+=0;

		// $date1_hours=(strtotime("8:00:00")-strtotime("00:00:00"))/3600;
		$date1_his="8:00:00";
		}


		if ($daytotal==0)
		{

			if ( strtotime($date1_his) <=strtotime("10:00:00")  )
			{
				if (strtotime($date2_his) <= strtotime("10:00:00") )
					$flag_temp+=0;
				elseif (strtotime($date2_his) <= strtotime("12:00:00") )
					$flag_temp+=0*60;
				elseif (strtotime($date2_his) <= strtotime("15:00:00") )
					$flag_temp+=45*60;
				elseif (strtotime($date2_his) <= strtotime("16:45:00") )
					$flag_temp+=45*60;
			}
			elseif (  strtotime($date1_his) <=strtotime("12:00:00"))
			{
				if (strtotime($date2_his) <= strtotime("12:00:00")  )
					$flag_temp+=0;
				elseif (strtotime($date2_his) <= strtotime("15:00:00")  )
					$flag_temp+=45*60;
				elseif (strtotime($date2_his) <= strtotime("16:45:00")  )
					$flag_temp+=45*60;
			}
			elseif (  strtotime($date1_his) <=strtotime("15:00:00"))
			{
				if (strtotime($date2_his) <= strtotime("15:00:00")  )
					$flag_temp+=0;
				elseif (strtotime($date2_his) <= strtotime("16:45:00")  )
					$flag_temp+=0*60;
			}
			elseif (  strtotime($date1_his) <=strtotime("16:45:00"))
				$flag_temp+=0;
		}
		$daytotal -=1;

	}
	$tongthoigianthietne=$totaltime-$flag_temp;

	$check_sunday=0;
	while ( (strtotime($day_sunday) -$date__1 ) < ($date__2 - $date__1))
	{
		$check_sunday+=1;
		$day_sunday=strtotime($day_sunday)+7*86400;
		$day_sunday=date("d-m-Y H:i:s",$day_sunday);
	}
	 $tempchecksunday=$date1_nameday;
	$date1_checkholiday="$date1_year-$date1_mon-$date1_day";
	$date2_checkholiday="$date2_year-$date2_mon-$date2_day";
	//echo "date1: $date1_checkholiday va date2: $date2_checkholiday <br>";
		while( ( strtotime($date1_checkholiday) <= strtotime($date2_checkholiday) ) )
	{
		$sql="SELECT * FROM holiday where holiday_date='$date1_checkholiday '";
		$query=mysql_query($sql);
		$array=mysql_fetch_array($query);
		$num=mysql_num_rows($query);
		if ($num!=0 and $tempchecksunday!='Sunday')
		{
		$check_sunday+=1;
		}
		$date1_checkholiday=strtotime($date1_checkholiday) + 86400;
		$tempchecksunday=getdate($date1_checkholiday);
		$tempchecksunday=$tempchecksunday['weekday'];
		$date1_checkholiday=date("Y-m-d ",$date1_checkholiday);
		//echo $date1_checkholiday;
	}
	// while ( date1(nam-thang-ngay) < date(nam-thang-ngay) and date1 name thang ngay co bang voi le k)
	// 	neu co +1 checksunday
	//resolve if start to sunday to finish, subtract time work on sunday

		$tongthoigianthietne -=28800*$check_sunday;
	// echo "total time: ";
	// echo $totaltime/60;
	// echo " <br>";
	// echo "break time: ";
	// echo $flag_temp/60;
	// echo "<br>";
	// echo "tong thoi gian done: ";
	// echo $tongthoigianthietne;
 	$return=$tongthoigianthietne/60;
 	return $return;
}


// function tinh thoi gian tang ca
function tangca($start,$finish)

{
	$Start=$start;
	$Finish=$finish;
	//fe//cho "$start and $finish";
	$start=strtotime($Start);			//chuyen string thanh typedef time int
	$start__=strtotime($Start);
	$start=getdate($start);			//array [hours,minus,seconds,day,mon,year]
	$start_year=$start['year'];
	$start_mon=$start['mon'];
	$start_day=$start['mday']; //ngay
	$start_hours=$start['hours'];
	$start_minus=$start['minutes'];
	$start_nameday=$start['weekday'];
	$start_his="$start_hours:$start_minus:00";

	// echo $date1_nameday;
	$finish=strtotime($Finish);
	$finish__=strtotime($Finish);
	$finish=getdate($finish);
	//$date__2=strtotime($finish);

	$finish_year=$finish['year'];
	$finish_mon=$finish['mon'];
	$finish_day=$finish['mday']; //ngay
	$finish_hours=$finish['hours'];
	$finish_minus=$finish['minutes'];
	$finish_nameday=$finish['weekday'];
	$finish_his="$finish_hours:$finish_minus:00";


	$overtime=0;
	$temp=0;

	if (strotime($start_his)> strtotime("16:45:00"))
	{
		$overtime=($finish__ - $start__)/60 - 30;
	}
	else
		{

			if (strotime($start_his) <= strtotime("10:00:00"))
			{
				if ( strotime($finish_his)<=strtotime("10:00:00"))
					$temp=0;
				elseif ( strotime($finish_his)<=strtotime("12:00:00"))
					$temp=15;
				elseif ( strotime($finish_his)<=strtotime("15:00:00"))
					$temp=60;
				elseif ( strotime($finish_his)<=strtotime("16:45:00"))
					$temp=75;
				else $temp=105;
			}
			elseif (strotime($start_his) <= strtotime("12:00:00"))
			{
				if ( strotime($finish_his)<=strtotime("12:00:00"))
					$temp=0;
				elseif ( strotime($finish_his)<=strtotime("15:00:00"))
					$temp=45;
				elseif ( strotime($finish_his)<=strtotime("16:45:00"))
					$temp=60;
				else $temp=90;
			}
			elseif (strotime($start_his) <= strtotime("15:00:00"))
			{
				if ( strotime($finish_his)<=strtotime("15:00:00"))
					$temp=0;
				elseif ( strotime($finish_his)<=strtotime("16:45:00"))
					$temp=15;
				else $temp=45;
			}
			elseif (strotime($start_his) <= strtotime("16:45:00"))
			{
				if ( strotime($finish_his)<=strtotime("16:45:00"))
				$temp=0;
				else $temp=30;
			}
			elseif (strotime($start_his) > strtotime("16:45:00"));


		}

		$overtime=($finish__ - $start__)/60 - $temp;

	return $overtime;
}

// function check xem phai ngay le or sunday hay khong, neu phai thi thoi gian lui ve ngay truoc do
function checkholiday($date)
{
	$Date=$date;
	// echo "$Date ";
	$date=strtotime($Date);			//chuyen string thanh typedef time int
	$date=getdate($date);			//array [hours,minus,seconds,day,mon,year]
	$date_year=$date['year'];
	$date_mon=$date['mon'];
	$date_day=$date['mday']; //ngay
	$date_hours=$date['hours'];
	$date_minus=$date['minutes'];
	// echo "$date_hours va $date_minus <br>";
	$date_nameday=$date['weekday'];

	$checkday="$date_year-$date_mon-$date_day";
	$sql="SELECT * FROM holiday where holiday_date='$checkday'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	$flag=0;
	while (($num!=0 )or ($date_nameday =='Sunday'))
	{	$flag=1;
		$checkday=strtotime($checkday) - 86400;
		$date_nameday=getdate($checkday);
		$date_nameday=$date_nameday['weekday'];
		$checkday=date("Y-m-d ",$checkday);
		$sql="SELECT * FROM holiday where holiday_date='$checkday'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);

	}
	if ($flag==1)
	$return=("$checkday 16:45:00");
	else
	$return=("$checkday $date_hours:$date_minus:00");
	// $return=("$checkday 16:45:00");
	return $return;
	// echo $return;

}

// function tinh thoi gian tang ca cua qua trinh chuyen doi cong viec dot xuat
function subtime($start,$finish)
{
	$Start=$start;
	$Finish=$finish;
	// echo "$start and $finish";
	$start=strtotime($Start);			//chuyen string thanh typedef time int
	$start__=strtotime($Start);
	$start=getdate($start);			//array [hours,minus,seconds,day,mon,year]
	$start_year=$start['year'];
	$start_mon=$start['mon'];
	$start_day=$start['mday']; //ngay
	$start_hours=$start['hours'];
	$start_minus=$start['minutes'];
	$start_nameday=$start['weekday'];
	// echo $date1_nameday;
	$finish=strtotime($Finish);
	$finish__=strtotime($Finish);
	$finish=getdate($finish);
	//$date__2=strtotime($finish);

	$finish_year=$finish['year'];
	$finish_mon=$finish['mon'];
	$finish_day=$finish['mday']; //ngay
	$finish_hours=$finish['hours'];
	$finish_minus=$finish['minutes'];
	$finish_nameday=$finish['weekday'];


	//variables
	$overtime=0;
	$exactlytime=0;
	$temp=$finish_hours;

	if ( $start_day != $finish_day)
		{
		$finish_hours+=24;
		$temp=23;
		}
	$finish_his="$temp:$finish_minus:00";
	$checkdaystart="$start_year-$start_mon-$start_day";
	$sql="SELECT * FROM holiday where holiday_date='$checkdaystart'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);

	if (($num!=0 )or ($start_nameday =='Sunday'))
	{
		$overtime+=chuyenviec($Start,$Finish);
	}
	else
	{
		if (8<=$finish_hours && strtotime($finish_his) <=strtotime("17:15:00"))
			$overtime+=0;
		else
		{
			$overtime+= ($finish_hours -17)*60 + ($finish_minus -15);
		}

	}
	return $overtime;
	// echo $return;

}
?>
