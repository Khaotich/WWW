<!DOCTYPE html>
<html>
<head>
    <mata charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
		* {font-family:Arial,Tahoma,Sans}
		body {background:#eee;}
		h1 {font-weight:normal;font-size:3em}
		a {text-decoration:none}
		div#main {text-align:left;
				max-width:700px;
				margin:auto;
				min-height:700px;
				padding:10px
		}
		div#menu > a {border: 2px solid blue; margin-right: 3px; padding: 5px;}
		td,tr {width: 8px; border-collapse: collapse; border: 2px solid black;}
    </style>
</head>
<body>
<div id=main>
<?php
include "menu.php";
?>