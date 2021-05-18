<?php
    if(isset($_REQUEST['numEst'])){
        $numEst = $_REQUEST['numEst'];
    }else{
        $numEst = 0;
    }

    echo '</br>';echo '</br>';
    echo '<form method="post" action="" style="margin-left: 5%">';
    echo '<label for="numEst">Ingrese el numero de estudiantes a calcular</label>';
    echo '</br>';
    echo '<input type="text" name="numEst" id="numEst" value="'.$numEst.'">';

    echo '</br>';
    echo '</br>';
    echo '<input type="submit" name="geneEst" id="geneEst" value="Generar campos">';

    echo '</br>';
    echo '</br>';
    echo '<input type="button" name="geneEst" id="geneEst" value="Promedio general" onClick="promedioCompleto();">';
    echo '</form>';

    echo '<script>
            let valores = {};
            let numeEst = '.$numEst.'

            function promedioCompleto(){
                if(numeEst > 0){
                    for(x = 1; x <=numeEst; x++){
                        if(document.getElementById("1notaest"+x).value >= 0 && document.getElementById("1notaest"+x).value <= 5.0 && document.getElementById("2notaest"+x).value >=0 && document.getElementById("2notaest"+x).value <= 5.0 && document.getElementById("3notaest"+x).value >= 0 && document.getElementById("3notaest"+x).value <= 5.0){
                            let error = []
                            let cont = 0;
                            for(y = 1; y <= 3; y++){
                                if(document.getElementById(y+"notaest"+x).value == ""){
                                    error[cont] = y;
                                    cont = cont + 1;
                                }
                            }
                            let mensaje = ""
                            if(error.length > 0){
                                for(f=0; f < error.length; f++){
                                        mensaje = mensaje + "\nHace falta la nota "+error[f]+" del estuadiante "+x
                                }
                                alert(mensaje)
                            }else{
                                valores[x] = {"nota1": document.getElementById("1notaest"+x).value, "nota2": document.getElementById("2notaest"+x).value, "nota3": document.getElementById("3notaest"+x).value}
                            }
                        }else{
                            alert("Debe ingresar notas en el rango de 0 a 5.0")
                        }
                    }
                    calPromComp(valores)
                }else{
                    alert("Debe seleccionar la cantidad de estudiantes")
                }
            }

            function calPromComp(valores){

                for(x in valores){
                    valores[x].prom = ((3.5-(((valores[x].nota1*15))/100+((valores[x].nota2*20))/100+((valores[x].nota3*30))/100))*100)/35
                }

                let prom = 0;
                let datos = 0;
                console.log(valores)
                for(y in valores){
                    prom = prom + valores[y].prom
                    datos = datos + 1
                }
                let promCur = prom/datos
                alert("El promedio de notas en este curso es: "+Math.round(promCur*10)/10)


            }
        </script>';

    for ($i=1; $i <= $numEst; $i++) {
        echo '
        <div style="width: 90%; border: 2px solid black; padding-left: 10px; margin: auto;">
            <h4>Estudiante '.$i.'</h4>
            <form method="post" action="" id="formEst'.$i.'">
                <input type="hidden" name="numEst" id="numEst" value="'.$numEst.'">
                <input type="hidden" name="est" id="est'.$i.'" value="'.$i.'">
                <label for="1notaest'.$i.'">Primera nota estudiante '.$i.'</label>
                <input type="text" name="1notaest'.$i.'" id="1notaest'.$i.'" value="">
                </br>
                </br>
                <label for="2notaest'.$i.'">Segunda nota estudiante '.$i.'</label>
                <input type="text" name="2notaest'.$i.'" id="2notaest'.$i.'" value="">
                </br>
                </br>
                <label for="3notaest'.$i.'">Tercera nota estudiante '.$i.'</label>
                <input type="text" name="3notaest'.$i.'" id="3notaest'.$i.'" value="">
                </br>
                </br>
                <input type="submit" name="calcula'.$i.'" name="calcula'.$i.'" value="Calcular">
            </form>
        </div>

        </br>';

        echo '<script>
                document.getElementById("formEst'.$i.'").addEventListener("submit", function(event){
                    event.preventDefault()
                    let nota1 =0;
                    let nota2 =0;
                    let nota3 =0;
                    let estudiante = 0;
                    nota1 = document.getElementById("1notaest'.$i.'").value
                    nota2 = document.getElementById("2notaest'.$i.'").value
                    nota3 = document.getElementById("3notaest'.$i.'").value
                    estudiante = document.getElementById("est'.$i.'").value

                    if(nota1 >= 0 && nota1 <= 5.0 && nota2 >=0 && nota2 <= 5.0 && nota3 >= 0 && nota3 <= 5.0){
                        notaExam = ((3.5-(((nota1*15))/100+((nota2*20))/100+((nota3*30))/100))*100)/35

                        if(notaExam > 0 && notaExam < 1.8){
                            estado = "Exelente :)";
                        }else if(notaExam > 1.9 && notaExam < 2.5){
                            estado = "Bueno";
                        }else if(notaExam > 2.6){
                            estado = "Debe estudiar mas :("
                        }
                        //valores['.$i.'] = {"nota1": nota1, "nota2": nota2, "nota3": nota3}
                        let mensaje = "Estudiante: "+estudiante+" \nNota faltante: "+Math.round(notaExam*10)/10+" \n"+estado;

                        alert(mensaje)
                    }else{
                        alert("Debe ingresar notas en el rango de 0 a 5.0")
                    }
                });

            </script>';

    }

?>
