<?php session_start();	
	require_once 'model/model_dto/PdfDto.php';
	require_once 'model/model_dto/ReportDto.php';
	require_once 'model/model_dao/ReportDao.php';	

	class Reports {

		private $reportDao;
		private $module;
		public function __construct(){
			$this->model = new ReportDao;
			$this->module = $_SESSION['module'];
		}
		public function index(){
			if (isset($_SESSION['userDto'])) {
				require_once 'view/roles/'.$this->module.'/header.php';
				require_once 'view/modules/4_mod_reports/reports_imp/reports_imp.main.view.php';
				require_once 'view/roles/'.$this->module.'/footer.php';
			} else {
				header('Location: ?');	
			}
		}

		public function repConsultarUsuarios(){
			$pdf = new PdfDto('P', 'mm', array(215.9, 279.4));			
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','B',12);
			$pdf->cell(3);
			$pdf->cell(10, 10, 'Rol', 1, 0, 'C', 0);
			$pdf->cell(10, 10, 'Id', 1, 0, 'C', 0);
			$pdf->cell(30, 10, 'Doc Ident', 1, 0, 'C', 0);
			$pdf->cell(30, 10, 'Nombres', 1, 0, 'C', 0);
			$pdf->cell(30, 10, 'Apellidos', 1, 0, 'C', 0);
			$pdf->cell(60, 10, 'Correo', 1, 0, 'C', 0);				
			$pdf->cell(20, 10, 'Estado', 1, 1, 'C', 0);
			$reportes = $this->model->repConsultarUsuarios();
			
			for ($i=0; $i < count($reportes); $i++) { 
				$pdf->cell(3);
				$pdf->SetFont('Times','',12);
				$pdf->cell(10, 10, $reportes[$i][0], 1, 0, 'C', 0);
				$pdf->cell(10, 10, $reportes[$i][1], 1, 0, 'C', 0);
				$pdf->cell(30, 10, $reportes[$i][2], 1, 0, 'C', 0);
				$pdf->cell(30, 10, utf8_decode($reportes[$i][3]), 1, 0, 'C', 0);
				$pdf->cell(30, 10, utf8_decode($reportes[$i][4]), 1, 0, 'C', 0);
				$pdf->cell(60, 10, $reportes[$i][5], 1, 0, 'C', 0);				
				$pdf->cell(20, 10, $reportes[$i][7], 1, 1, 'C', 0);
			}
			$pdf->Output('F', 'view/modules/4_mod_reports/reports_imp/consulta_usuarios.pdf');
			require_once 'view/roles/admin/header.php';
			require_once 'view/modules/4_mod_reports/reports_imp/reports_imp.cons_usuarios.view.php';
			require_once 'view/roles/admin/footer.php';
		}

	}


?>