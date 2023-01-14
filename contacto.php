<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/wepb">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Complete el formulario de contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email">
                
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu teléfono" id="email">
                
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Compra o Venta</label>
                <select id="opciones">
                    <option value="" disabled selected>--Selecciona--</option>
                    <option value="compra">Compra</option>
                    <option value="venta">Vende</option>

                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
                
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>

                <p>Medio de contacto:</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, seleccion día y horario:</p>
                <label for="fecha">Fecha:</label>
                <input type="date"  id="fecha">
                
                <label for="horario">Horario:</label>
                <input type="time"  id="horario" min="09:00" max="18:00">

            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate('footer'); ?>
    
   