		<!-- Área Contenido -->
		<div class="tope"></div>
		<div class="titulo">
			<h1>Olvido de Contraseña</h1>
		</div>
		<div class="migas color-gris-oscuro">
			<a href="login.html">Inicio</a>
			<p> &nbsp / &nbsp</p>
			<a href="forgot.html">Olvido de Contraseña</a>
		</div>
		<section class="paginas forms color-gris-claro">
			<form class="form form-forgot" action="login.html" method="post" name="formForgot">
				<h2 class="form-subtitulo">Olvido de Contraseña</h2>
				<div class="form-cuerpo color-blanco">
					<div class="form-control">
						<label class="label" for="correo-olv">Correo</label>
						<input class="input" type="email" id="correo-olv" placeholder="Correo Usuario"
							placeholder="Correo Usuario"
							pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}"
							title="Ingrese un correo válido" required>
					</div>
				</div>
				<div class="form-pie">
					<input type="reset" id="cancelar-olvido" value="Cancelar">
					<input type="submit" id="submit-olvido" value="Enviar">
				</div>
			</form>
		</section>