<?php
function ft_is_sort($tab) {
	if (is_array($tab)) {
		$tmp_tab = $tab;
		sort($tmp_tab);
		foreach ($tmp_tab as $k=>$v) {
			if ($v !== $tab[$k]) {
				return (false);
			}
		}
		return (true);
	}
	return (false);
}
?>