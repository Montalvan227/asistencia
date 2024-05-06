<table>
  <thead>
    <tr>
      <th>DNI</th>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Grado y Sección</th>
      <th>Hora de Ingreso</th>
      <th>Estado</th>
    </tr>
  </thead> 
  <tbody>
    @foreach($asistencias as $asistencia)
      <tr>
        <td>
          {{ $asistencia->alumno->dni }}
        </td>
        <td>
          {{ $asistencia->alumno->nombres }}
        </td>
        <td>
          {{ $asistencia->alumno->apellido_paterno }}
          {{ $asistencia->alumno->apellido_materno}}
        </td>
        <td>
          {{ $asistencia->alumno->grado }}
          {{ $asistencia->alumno->seccion }}
        </td>
        <td>
          {{ $asistencia->created_at }}
        </td>
        <td>
          {{ $asistencia->estado }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>