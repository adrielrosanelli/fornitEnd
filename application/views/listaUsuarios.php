<h2>Lista de Usuarios</h2>
<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Email</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u){?>

            
        <tr>
            <td><?=$u->id;?></td>
            <td><?=$u->email;?></td>
            <td></td>
        </tr>
        <?php }?>
    </tbody>
</table>