<?php

class View{

	/**
	 * @param $view: nama view yang digunakan
	 * @param $param: list dari variabel php yang digunakan dalam view
	 * Beberapa param yang penting:
	 * - title: judul page
	 * - styleSrcList: array dari nama css yang diperlukan
	 * - scriptSrcList: array dari nama js yang diperlukan
	 * - uplevel (optional): level kedalaman dari url halaman
	 * 		misalnya jika halaman ada di /admin, maka uplevel = 0 (atau boleh dikosongkan)
	 * 		jika halaman ada di /admin/login, maka uplevel = 1 (harus diisi)
	 */
	public static function createView($view, $param){
		foreach ($param as $key => $value) {
			$$key = $value;
		}

		$upPrefix = "";
		if (isset($uplevel)){
			for ($i = 0; $i<$uplevel; $i++){
				$upPrefix .= '../';
			}
		}

		ob_start();
		include 'view/'.$view;
		$content = ob_get_contents();
		ob_end_clean();
		
		ob_start();
		include 'view/layout/layout.php';
		$include = ob_get_contents();
		ob_end_clean();
		return $include;
	}
}
?>