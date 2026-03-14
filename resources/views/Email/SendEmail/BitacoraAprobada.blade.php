<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácora aprobada</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; margin-top: 20px; border: 1px solid #e1e1e1; }
        .header { background-color: #4f46e5; color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; color: #333333; line-height: 1.6; }
        .footer { background-color: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #6b7280; }
        .button { display: inline-block; padding: 12px 24px; background-color: #4f46e5; color: white !important; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>¡Hola, {{ $aprendiz->Nombres}} {{ $aprendiz->Apellidos}}!</h1>
    </div>
    <div class="content">
        <h2>Aprendiz</h2>
        <p>Te escribimos para informarte que el instructor {{$instructor->Nombres }} {{ $instructor->Apellidos }} a aprobado tu Bitácora </p>

        <p>Puedes revisar los detalles presionando el siguiente botón:</p>

        <a href="{{url('/home')}}" class="button">Ir al Dashboard</a>

        <p style="margin-top: 5px;">Nombre: {{ $aprendiz->Nombres }} {{$aprendiz->Apellidos}}</p>
        <p style="margin-top: 5px;">Correo institucional: {{ $aprendiz->Correo_Institucional }}</p>
        <hr>
        <p style="margin-top: 30px;">Si tienes alguna duda puedes comunicarte con el instructor de seguimientos mediante su correo institucional.</p>
        <p style="margin-top: 5px;">Instructor: {{ $instructor->Nombres }} {{$instructor->Apellidos}}</p>
        <p style="margin-top: 5px;">Correo institucional del instructor: {{ $instructor->Correo_Institucional }}</p>
        <p style="margin-top: 5px;">Consulte toda la información en el sistema SGEP </p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Sistega de gestion a la etapa productiva
    </div>
</div>
</body>
</html>
