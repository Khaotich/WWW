<!-- zadanie 9 -->

<?php
include "0begin.php";
?>

<h1>Czat</h1>

<form>
<input placeholder="Imię" name="imie"><br>
<input placeholder="Wpis" name="wpis"><br>
<input type="text" name="login" id="login" placeholder="login"><br>
<input type="password" placeholder="Hasło" name="haslo"><br>
<input type="submit" value="Wyślij"><br>
</form>

<ul></ul>

<script>
  
  $("form").submit(function(){
                   $.post("chat_script.php", 
                   { imie:this.imie.value, 
                     wpis:this.wpis.value,
                     login:this.login.value,
                     haslo:this.haslo.value
                   },
                   function(data){ 
                        $('ul').html(data);
                        $('input[name=wpis]').val('');
                   });
            return false;
  });
  
  $('ul').load('wpisy.html'); // wczytaj rozmowę

  setInterval(function(){$('ul').load('chat_script.php')},1000); //odświeżaj co sekundę

</script>

<?php
include "0end.php";
?>