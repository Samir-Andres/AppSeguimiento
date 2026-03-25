<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        /* Estilo para el hover del botón (solo clientes modernos) */
        .btn-responder:hover { background-color: #4338ca !important; }
    </style>
</head>
<body style="margin: 0; padding: 40px 10px; background-color: #f8fafc; font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 576px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; border-collapse: separate; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">

    <!-- Header -->
    <tr>
        <td style="padding: 40px 32px; text-align: center; border-bottom: 1px solid #f1f5f9;">
            <div style="margin: 0 auto 16px auto; width: 56px; height: 56px; background-color: #eef2ff; border-radius: 9999px; display: inline-block;">
                <img src="{{asset('img/SGEP.png')}}" width="28" style="margin-top: 14px; color: #4f46e5;" alt="SGEP Icon">
            </div>
            <h1 style="margin: 0; font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.025em;">Nuevo Mensaje Recibido</h1>
            <p style="margin: 8px 0 0 0; font-size: 14px; color: #64748b;">Se ha registrado una nueva entrada en tu formulario de contacto.</p>
        </td>
    </tr>

    <!-- Contenido principal -->
    <tr>
        <td style="padding: 32px;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!-- Fila 1: Nombres y Email -->
                <tr>
                    <td style="padding-bottom: 24px;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="48%" style="background-color: rgba(248, 250, 252, 0.5); border: 1px solid #f1f5f9; border-radius: 8px; padding: 16px; vertical-align: top;">
                                    <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; display: block;">Nombres Completos</span>
                                    <p style="margin: 4px 0 0 0; font-size: 14px; font-weight: 600; color: #334155;">{{ $data['Nombres'] }}</p>
                                </td>
                                <td width="4%"></td>
                                <td width="48%" style="background-color: rgba(248, 250, 252, 0.5); border: 1px solid #f1f5f9; border-radius: 8px; padding: 16px; vertical-align: top;">
                                    <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; display: block;">Correo</span>
                                    <p style="margin: 4px 0 0 0; font-size: 14px; font-weight: 600; color: #334155;">{{ $data['email'] }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Teléfono -->
                <tr>
                    <td style="padding-bottom: 24px;">
                        <div style="background-color: rgba(248, 250, 252, 0.5); border: 1px solid #f1f5f9; border-radius: 8px; padding: 16px;">
                            <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; display: block;">Número de teléfono</span>
                            <p style="margin: 4px 0 0 0; font-size: 14px; font-weight: 600; color: #334155;">{{ $data['Telefono'] }}</p>
                        </div>
                    </td>
                </tr>

                <!-- Mensaje -->
                <tr>
                    <td style="padding-bottom: 32px;">
                        <div style="background-color: rgba(248, 250, 252, 0.5); border: 1px solid #f1f5f9; border-radius: 8px; padding: 16px;">
                            <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; display: block;">Mensaje</span>
                            <p style="margin: 4px 0 0 0; font-size: 14px; font-weight: 600; color: #334155; line-height: 1.5;">{{ $data['Asunto'] }}</p>
                        </div>
                    </td>
                </tr>

                <!-- Botón de acción -->
                <tr>
                    <td>
                        <a href="mailto:{{ $data['email'] }}" class="btn-responder" style="display: block; width: 100%; box-sizing: border-box; background-color: #4f46e5; border-radius: 12px; padding: 16px; text-align: center; text-decoration: none; font-size: 14px; font-weight: 700; color: #ffffff; box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.1);">
                            Responder por Email
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="padding: 32px; background-color: rgba(248, 250, 252, 0.5); text-align: center; border-top: 1px solid #f8fafc;">
            <div style="margin-bottom: 24px;">
                <a href="#" style="margin: 0 12px; font-size: 12px; color: #4f46e5; text-decoration: none;">Instagram</a>
                <a href="#" style="margin: 0 12px; font-size: 12px; color: #4f46e5; text-decoration: none;">Facebook</a>
                <a href="#" style="margin: 0 12px; font-size: 12px; color: #4f46e5; text-decoration: none;">Github</a>
            </div>
            <p style="margin: 0; font-size: 11px; color: #94a3b8; line-height: 1.8;">
                Este mensaje fue enviado desde el portal de <strong>SGEP</strong><br>
                &copy; {{ date('Y') }} Todos los derechos reservados.
            </p>
        </td>
    </tr>
</table>

</body>
</html>
