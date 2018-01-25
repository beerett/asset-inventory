function check() {
	if (isset($_GET['school'])) {
		$s = $_GET['school'];
		if ($s == "HS") { return "checked";  }
	}
}
