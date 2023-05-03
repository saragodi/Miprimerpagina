<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />

    <title>Correo de Notificación</title>
</head>

<body
    style="
	padding:0 !important; 
	margin:0 auto !important; 
	display:block !important; 
	min-width:100% !important; 
	width:100% !important; 
	background:#f1f2f6; 
	-webkit-text-size-adjust:none;
	color: #2f3542;
	font-family: 'Helvetica', sans-serif;
	font-size: 90%;
	">
    <center>
        <table style="width: 100%;" cellspacing="20">
            <tbody>
                <tr>
                    <td>
                        <h1 style="margin-bottom:0px; text-transform: uppercase;">Tienes un nuevo contacto de aplicante.
                        </h1>
                        <a href="{{ route('people.show', $person_id) }}"
                            style="background: #fff; border:2px solid #2f3542; border-radius: 13px; padding:15px 20px; text-decoration: none; margin: 20px 0; display:block; text-align: center; width:50%; color: #2f3542;">Ver
                            el mensaje en tu plataforma.</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </center>
</body>

</html>
