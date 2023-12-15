<?php

namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio" => "View/inicio.php",
            "contacto" => "View/contacto.php",
            "nosotros" => "View/nosotros.php",
            "inscripcion" => "View/inscripcion.php",
            "verinscripcion" => "View/mostrarinscripcion.php",
            "ingresoAlumno" => "View/Alumnos/ingresoAlumno.php",
            "mostrarAlumnos" => "View/Alumnos/mostrarAlumnos.php",
            "editarAlumnos" => "View/Alumnos/editarAlumno.php",
            "eliminarAlumno" => "View/Alumnos/eliminarAlumno.php",
            "repAlumnos" => "View/Alumnos/repAlumnos.php",
            "AsignarCursos" => "View/Cursos/AsignarCursos.php",
            "IngresoCursos" => "View/Cursos/IngresoCursos.php",
            "editarCursos" => "View/Cursos/editarCursos.php",
            "eliminarCursos" => "View/Cursos/eliminarCursos.php",
            "mostrarCursos" => "View/Cursos/mostrarCursos.php",
            "tablaCursos" => "View/Cursos/tablaCursos.php",
            "pdfCursos" => "View/Cursos/pdfCursos.php",
            "excelCursos" => "View/Cursos/excelCursos.php",
            "mostrarGrado" => "View/Grado/mostrarGrado.php",
            "pdfGrado" => "View/Grado/pdfGrado.php",
            "ingresoGrado" => "View/Grado/ingresoGrado.php",
            "editarGrado" => "View/Grado/editarGrado.php",
            "eliminarGrado" => "View/Grado/eliminarGrado.php",
            "excelGrado" => "View/Grado/excelGrado.php",
            "repUsuario" => "View/Usuarios/repUsuario.php",
            "ingresoUsuario" => "View/Usuarios/ingresoUsuario.php",
            "editarUsuario" => "View/Usuarios/editarUsuario.php",
            "eliminarUsuario" => "View/Usuarios/eliminarUsuario.php",                                   
            "mostrarUsuario" => "View/Usuarios/mostrarUsuario.php",
            "pdfUsuario" => "View/Usuarios/pdfUsuario.php",
            "mostrarAsignacion" => "View/Asignacion/mostrarAsignacion.php",
            "tablaAsignacion" => "View/Asignacion/tablaAsignacion.php",
            "pdfAsignacion" => "View/Asignacion/pdfAsignacion.php",
            "ingresoAsignar" => "View/Asignacion/ingresoAsignar.php",            
            "editarAsignacion" => "View/Asignacion/editarAsignacion.php",
            "eliminarAsignacion" => "View/Asignacion/eliminarAsignacion.php",
            "editarInscripcion" => "View/editarInscripcion.php",
            "editarInscripcion" => "View/editarInscripcion.php",
            "eliminarInscripcion" => "View/eliminarInscripcion.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            "inscripcioncategoria" => "View/inscripcioncategoria.php",
            "crearUsuarioEstudiante" => "View/nuevoUsuario.php",
            "grafica" => "View/grafica.php",
            "pdf" => "View/pdf.php",
            "mostrarTablas" => "View/mostrarTablas.php",
            "recibirCursoAjax" => "View/recibirCursoAjax.php",
            "enviarCursoAjax" => "View/enviarCursoAjax.php",
            default => "View/error.php"
        };
        return $modulo;
    }

}

/*
<?php

namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio" => "View/inicio.php",
            "contacto" => "View/contacto.php",
            "nosotros" => "View/nosotros.php",
            "inscripcion" => "View/inscripcion.php",
            "verinscripcion" => "View/mostrarinscripcion.php",
            "editarInscripcion" => "View/editarInscripcion.php",
            "eliminarInscripcion" => "View/eliminarInscripcion.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            "inscripcioncategoria" => "View/inscripcioncategoria.php",
            "crearUsuarioEstudiante" => "View/nuevoUsuario.php",
            "grafica" => "View/grafica.php",
            default => "View/error.php"
        };
        return $modulo;
    }

}

?> */
?>