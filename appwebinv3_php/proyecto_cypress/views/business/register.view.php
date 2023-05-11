		<!-- Área Contenido -->
		<div class="tope"></div>
		<div class="titulo">
			<h1>Registro</h1>
		</div>
		<div class="migas color-gris-oscuro">
			<a href="../index.html">Inicio</a>
			<p> &nbsp / &nbsp</p>
			<a href="register.html">Registro</a>
		</div>
		<section class="paginas forms color-gris-claro">
			<form id="formRegister" name="formRegister" class="form form-register" action="login.html" method="post">
				<a class="enlace-registro" href="?c=Login">Iniciar Sesión</a>
				<h2 class="form-subtitulo">Registro</h2>
				<div class="form-cuerpo color-blanco">
					<div class="form-control">
						<label class="label" for="nombres-reg">Nombres</label>
						<input class="input" type="text" id="nombres-reg" placeholder="Nombres"
							pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Nombre(s) Válido(s)" required>
					</div>
					<div class="form-control">
						<label class="label" for="apellidos-reg">Apellidos</label>
						<input class="input" type="text" id="apellidos-reg" placeholder="Apellidos"
							pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Apellido(s) Válido(s)" required>
					</div>
					<div class="form-control">
						<label class="label" for="correo-reg">Correo</label>
						<input class="input" type="email" id="correo-reg" placeholder="Correo Usuario"
							placeholder="Correo Usuario"
							pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}"
							title="Ingrese un correo válido" required>
					</div>
					<div class="form-control">
						<label class="label" for="pass-reg">Contraseña</label>
						<input class="input" type="password" id="pass-reg" placeholder="Contraseña: 5 a 8 caracteres"
							placeholder="Contraseña: 5 a 8 caracteres" pattern="[A-Za-z0-9]{5,8}"
							title="Entre 5 y 8 caracteres" required>
					</div>
					<div class="form-control">
						<label class="label" for="conf-pass-reg">Confirmación</label>
						<input class="input" type="password" id="conf-pass-reg"
							placeholder="Contraseña: 5 a 8 caracteres" placeholder="Contraseña: 5 a 8 caracteres"
							pattern="[A-Za-z0-9]{5,8}" title="Entre 5 y 8 caracteres" required>
					</div>
				</div>
				<div class="form-pie">
					<input type="reset" id="cancelar-register" value="Cancelar">
					<input type="submit" id="submit-register" value="Enviar">
				</div>
			</form>
		</section>