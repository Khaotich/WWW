<?php
	
	function check()
	{
		$db = new SQLite3('baza.db');
	
		$db -> query("create table if not exists filmy_seriale
		(id integer primary key autoincrement,
		nazwa text
		)");

		$db -> query("create table if not exists filmy_seriale_komentarze
		(id integer primary key autoincrement,
		id_filmu integer,
		id_uzytkownika integer,
		komentarz text
		)");

		$db -> query("create table if not exists ksiazki
		(id integer primary key autoincrement,
		nazwa text
		)");

		$db -> query("create table if not exists ksiazki_komentarze
		(id integer primary key autoincrement,
		id_ksiazki integer,
		id_uzytkownika integer,
		komentarz text
		)");

		$db -> query("create table if not exists muzyka
		(id integer primary key autoincrement,
		nazwa text,
		kategoria text,
		link_yt text
		)");

		$db -> query("create table if not exists muzyka_komentarze
		(id integer primary key autoincrement,
		id_muzyki integer,
		id_uzytkownika integer,
		komentarz text
		)");

		$db -> query("create table if not exists skoki
		(id integer primary key autoincrement,
		skoczek text,
		punkty integer
		)");

		$db -> query("create table if not exists uzytkownicy
		(id integer primary key autoincrement,
		login text,
		haslo text,
		imie text,
		nazwisko text
		)");

		$db -> close();
	}
	
?>