<?php

namespace App\Constants;

class HttpResponse
{
    //Messages
    const INSERT_SUCCESS = 'Registro guardado con éxito!';
    const UPDATE_SUCCESS = 'Registro actualizado con éxito!';
    const DELETE_SUCCESS = 'Registro eliminado con éxito!';

    //Errors
    const CREDENTIAL_INVALID = 'Credenciales incorrectas!';
    const REQUEST_INVALID = 'Error en los datos enviados en el formulario!';
    const INSERT_ERROR = 'Error al guardar el registro!';
    const UPDATE_ERROR = 'Error al editar el registro!';
    const DELETE_ERROR = 'Error al eliminar el registro!';
}
