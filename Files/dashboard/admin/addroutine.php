<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iron Gym | Rutina</title>
    <link rel="stylesheet" href="../../css/style.css" id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <style>
        .page-container .sidebar-menu #main-menu li#routinehassubopen > a {
            background-color: #2b303a;
            color: #ffffff;
        }
    </style>
    
<script type="text/javascript">
 function addRoutineToDay() {
    var selectedRoutine = document.getElementById("routineSelect").value;
    var selectedDay = document.getElementById("daySelect").value;
    var dayTextarea = document.getElementById(selectedDay);


    console.log("Selected Routine:", selectedRoutine);
    console.log("Selected Day:", selectedDay);
    console.log("Textarea ID:", selectedDay);

    if (dayTextarea !== null) {
        if (dayTextarea.value !== "") {
            dayTextarea.value += "\n";
        }
        dayTextarea.value += selectedRoutine;
    } else {
        console.error("Textarea not found for day:", selectedDay);
    }
}



    function updateRoutineOptions() {
        var routines = {
            "Principiante": {
                "Día 1": [
                    
                    "Sentadilla con peso corporal 3 x 15",
                    "Zancadas con mancuernas 3 x 15",
                    "Peso muerto con mancuernas 3 x 15",
                    "Extensiones de piernas en máquina 3 x 15",
                    "Curl femoral en máquina 3 x 15"
                ],
                "Día 2": [
                    "Press de banca con mancuernas 3 x 15",
                    "Press inclinado con mancuernas 3 x 15",
                    "Press declinado con mancuernas 3 x 15",
                    "Aperturas con mancuernas 3 x 15",
                    "Flexiones 3 x 15"
                ],
                "Día 3": [
                    "Remo con mancuerna 3 x 15",
                    "Jalón al pecho en polea 3 x 15",
                    "Remo en máquina 3 x 15",
                    "Pullover en máquina 3 x 15",
                    "Superman 3 x 15"
                ],
                "Día 4": [
                    "Press militar con mancuernas 3 x 15",
                    "Elevaciones laterales con mancuernas 3 x 15",
                    "Elevaciones frontales con mancuernas 3 x 15",
                    "Pájaro con mancuernas 3 x 15",
                    "Encogimientos de hombros con mancuernas 3 x 15"
                ],
                "Día 5": [
                    "Curl de bíceps con mancuernas 3 x 15",
                    "Curl de bíceps en máquina 3 x 15",
                    "Extensiones de tríceps en polea 3 x 15",
                    "Fondos en banco 3 x 15",
                    "Crunch abdominal 3 x 20",
                    "Plancha abdominal 3 x 20\""
                ],
                "Día 6": [
                    "Sentadilla con peso corporal 3 x 15",
                    "Press de banca con mancuernas 3 x 15",
                    "Remo con mancuerna 3 x 15",
                    "Press militar con mancuernas 3 x 15",
                    "Curl de bíceps con mancuernas 3 x 15",
                    "Crunch abdominal 3 x 20"
                ]
            },
            "Intermedio": {
                "Día 1": [
                    "Sentadilla con barra 3 x 12",
                    "Prensa de piernas 3 x 12",
                    "Peso muerto rumano 3 x 10",
                    "Extensiones de piernas 3 x 12",
                    "Curl femoral 3 x 12"
                ],
                "Día 2": [
                    "Press banca con barra 3 x 12",
                    "Press inclinado con mancuernas 3 x 12",
                    "Press declinado con barra 3 x 12",
                    "Aperturas con mancuernas 3 x 15",
                    "Fondos en paralelas 3 x 12"
                ],
                "Día 3": [
                    "Dominadas 3 x 10",
                    "Remo con barra 3 x 12",
                    "Remo con mancuerna 3 x 12",
                    "Jalón al pecho 3 x 12",
                    "Pull-over con mancuerna 3 x 15"
                ],
                "Día 4": [
                    "Press militar con barra 3 x 12",
                    "Press Arnold con mancuernas 3 x 12",
                    "Elevaciones laterales con mancuernas 3 x 15",
                    "Elevaciones frontales con mancuernas 3 x 15",
                    "Pájaro con mancuernas 3 x 15"
                ],
                "Día 5": [
                    "Curl de bíceps con barra 3 x 12",
                    "Curl de bíceps alterno con mancuernas 3 x 12",
                    "Extensión de tríceps en polea alta 3 x 12",
                    "Press francés con barra 3 x 12",
                    "Crunch abdominal 3 x 20",
                    "Plancha abdominal 3 x 30''"
                ],
                "Día 6": [
                    "Sentadilla frontal 3 x 12",
                    "Press banca con mancuernas 3 x 12",
                    "Remo con barra T 3 x 12",
                    "Press militar con mancuernas 3 x 12",
                    "Curl de bíceps con barra Z 3 x 12",
                    "Crunch abdominal con peso 3 x 20"
                ]
            },
            "Avanzado": {
                "Día 1": [
                    "Sentadilla frontal 4 x 10",
                    "Peso muerto con barra hexagonal 4 x 8",
                    "Prensa de piernas 4 x 10",
                    "Extensiones de piernas 4 x 12",
                    "Curl femoral 4 x 12",
                    "Elevación de talones en máquina 4 x 15"
                ],
                "Día 2": [
                    "Press de banca inclinado con barra 4 x 10",
                    "Press de banca plano con mancuernas 4 x 10",
                    "Press de banca declinado con barra 4 x 10",
                    "Aperturas con mancuernas en banco inclinado 4 x 12",
                    "Fondos en paralelas con peso 4 x 10"
                ],
                "Día 3": [
                    "Pull-ups lastradas 4 x 8",
                    "Remo con barra T 4 x 10",
                    "Remo invertido 4 x 10",
                    "Jalón al pecho agarre estrecho 4 x 10",
                    "Pull-over con barra 4 x 12"
                ],
                "Día 4": [
                    "Press militar con barra sentado 4 x 10",
                    "Press Arnold con mancuernas 4 x 10",
                    "Elevaciones laterales con mancuernas 4 x 12",
                    "Elevaciones frontales con mancuernas 4 x 12",
                    "Pájaro con mancuernas 4 x 12"
                ],
                "Día 5": [
                    "Curl de bíceps con barra Z 4 x 10",
                    "Curl de bíceps alterno con mancuernas 4 x 10",
                    "Extensión de tríceps en polea alta 4 x 10",
                    "Press francés con barra 4 x 10",
                    "Crunch abdominal con peso 4 x 20",
                    "Plancha abdominal 4 x 30''"
                ],
                "Día 6": [
                    "Sentadilla sumo 4 x 10",
                    "Press de banca inclinado con mancuernas 4 x 10",
                    "Remo con barra T 4 x 10",
                    "Press militar con mancuernas 4 x 10",
                    "Curl de bíceps con barra Z 4 x 10",
                    "Crunch abdominal con peso 4 x 20"
                ]
            }
        };

        var levelSelect = document.getElementById("levelSelect").value;
        var routineSelect = document.getElementById("routineSelect");
        var daySelect = document.getElementById("daySelect").value;

        routineSelect.innerHTML = "";

        if (routines[levelSelect] && routines[levelSelect][daySelect]) {
            for (var i = 0; i < routines[levelSelect][daySelect].length; i++) {
                var option = document.createElement("option");
                option.value = routines[levelSelect][daySelect][i];
                option.text = routines[levelSelect][daySelect][i];
                routineSelect.appendChild(option);
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateRoutineOptions();
    });
</script>

</head>
<body class="page-body page-fade" onload="collapseSidebar()" style="background-color: #ff0000;">
    <div class="page-container sidebar-collapsed" id="navbarcollapse">
        <div class="sidebar-menu">
            <header class="logo-env">
                <div class="logo">
                    <a href="main.php">
                        <img src="../../images/iron.png" alt="" width="192" height="80" />
                    </a>
                </div>
                <div class="sidebar-collapse" onclick="collapseSidebar()">
                    <a href="#" class="sidebar-collapse-icon with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>
            <?php include('nav.php'); ?>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-md-6 col-sm-8 clearfix"></div>
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        <li>Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></li>
                        <li>
                            <a href="cerrar sesión.php">
                                Cerrar Sesión <i class="entypo-logout right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <h3>Crear Rutina</h3>
            <hr />
            <div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
                <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
                    <div class="a1-container a1-dark-gray a1-center">
                        <h6>NUEVA RUTINA</h6>
                    </div>
                    <form id="form1" name="form1" method="post" class="a1-container" action="saveroutine.php">
    <table width="100%" border="0" align="center">
        <tr>
            <td height="35">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td height="35">Nombre de la Rutina:</td>
                        <td height="35"><input name="rname" size="30" required/></td>
                    </tr>
                    <tr>
                        <td height="35">Seleccione Nivel:</td>
                        <td height="35">
                            <select id="levelSelect" onchange="updateRoutineOptions()">
                                <option value="Principiante">Principiante</option>
                                <option value="Intermedio">Intermedio</option>
                                <option value="Avanzado">Avanzado</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                      
                        <td height="35">Seleccione Día:</td>
                        <td height="35">
                            <select id="daySelect" onchange="updateRoutineOptions()">
                                <option value="Día 1">Lunes</option>
                                <option value="Día 2">Martes</option>
                                <option value="Día 3">Miércoles</option>
                                <option value="Día 4">Jueves</option>
                                <option value="Día 5">Viernes</option>
                                <option value="Día 6">Sábado</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
    <td height="35">Seleccione Rutina:</td>
    <td height="35">
        <select id="routineSelect"></select>
        <div style="margin-bottom: 10px;"></div> <!-- Agregué un div con un margen inferior de 10px -->
        <button type="button" onclick="addRoutineToDay()">Añadir a Día</button>
    </td>
</tr>
                    <tr>
                        <td height="35">Lunes</td>
                        <td height="35">
                            <textarea name="day1" id="Día 1" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">Martes</td>
                        <td height="35">
                            <textarea name="day2" id="Día 2" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">Miércoles</td>
                        <td height="35">
                            <textarea name="day3" id="Día 3" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">Jueves</td>
                        <td height="35">
                            <textarea name="day4" id="Día 4" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">Viernes</td>
                        <td height="35">
                            <textarea name="day5" id="Día 5" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">Sábado</td>
                        <td height="35">
                            <textarea name="day6" id="Día 6" style="margin: 0px; width: 236px; height: 42px; resize:none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="35">&nbsp;</td>
                        <td height="35">
                            <button type="submit" class="a1-btn a1-blue">GUARDAR RUTINA</button>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
