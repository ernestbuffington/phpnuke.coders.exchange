<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/***************************************************************************
 *   copyright            : (C) ESO Software Inc.
 *   email                : scottybcoder#gmail.com
 ***************************************************************************/

/******************************************************************************* 
   1.  function returns 0 when only chars 0123456789 and . are found in a string
   2.  it returns 1 when more than one . is found in a string
   3.  it returns 1 when any other char is found in a string
   4.  else it returns 0   (meaning the string is a number)          author  TSB
  ******************************************************************************/ 

function is_num($var)
{
   $counter=0;

   for ($i=0;$i<strlen($var);$i++)
   {
      $ascii_code=ord($var[$i]);
      if ( intval($ascii_code)==46 )
      {
         $counter++;
         if ($counter > 1 )
		 {
            return 1;
            exit;
		 }

      }    

      if (intval($ascii_code) >=48 && intval($ascii_code) <=57 || intval($ascii_code)==46)
	  {
         continue;
      }
	  else
	  {          
         return 1;
         exit;
      }
   } 
   return 0;
} 

?>