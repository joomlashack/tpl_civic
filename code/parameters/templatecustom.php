<?php // $Id: datetime.php 19 2010-08-03 01:24:09Z jeremy $
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldTemplateCustom extends JFormField
{
	protected $type = 'templatecustom';

	protected function getInput()
	{
		$doc = JFactory::getDocument();
		$html = '';

		$html .= '<div class="container-fluid well">
	<div class="row-fluid">
		<div class="span12" style="line-height:30px">
			<h4>Athens</h4>
			<div class="row-fluid" style="text-align:center;">
				<div class="span2" style="background-color: #278BCE;color:white;">
					Color 1
				</div>
				<div class="span2" style="background-color: #8ED1F6;">
					Color 2
				</div>
				<div class="span2" style="background-color: #5D8CAC;color:white">
					Color 3
				</div>
				<div class="span2" style="background-color: #D3D1D4;">
					Color 4
				</div>
				<div class="span2" style="background-color: #E4EBF0;">
					Color 5
				</div>
			</div>
		</div>
		<br style="clear:both;">
		<h4>Barcelona</h4>
		<div class="span12" style="text-align:center;line-height:30px;">
			<div class="span2" style="background-color: #E08700;color:white;">
				Color 1
			</div>
			<div class="span2" style="background-color: #FFD675;">
				Color 2
			</div>
			<div class="span2" style="background-color: #E06500;color:white;">
				Color 3
			</div>
			<div class="span2" style="background-color: #D3D1D4;">
				Color 4
			</div>
			<div class="span2" style="background-color: #eee;">
				Color 5
			</div>

		</div>
		<br style="clear:both;">
		<h4>London</h4>
		<div class="span12" style="text-align:center;line-height:30px;">
			<div class="span2" style="background-color: #A841B4;color:white;">
				Color 1
			</div>
			<div class="span2" style="background-color: #E0CEFF;">
				Color 2
			</div>
			<div class="span2" style="background-color: #772E7F;color:white;">
				Color 3
			</div>
			<div class="span2" style="background-color: #D3D1D4;">
				Color 4
			</div>
			<div class="span2" style="background-color: #eee;">
				Color 5
			</div>
		</div>
		<br style="clear:both;">
		<h4>New York</h4>
		<div class="span12" style="text-align:center;line-height:30px;">
			<div class="span2" style="background-color: #20A785;color:white;">
				Color 1
			</div>
			<div class="span2" style="background-color: #FFFF00;">
				Color 2
			</div>
			<div class="span2" style="background-color: #248476;color:white;">
				Color 3
			</div>
			<div class="span2" style="background-color: #D3D1D4;">
				Color 4
			</div>
			<div class="span2" style="background-color: #eee;">
				Color 5
			</div>
		</div>
		<br style="clear:both;">
		<h4>Rome</h4>
		<div class="span12" style="text-align:center;line-height:30px;">
			<div class="span2" style="background-color: #CF3F3F;color:white;">
				Color 1
			</div>
			<div class="span2" style="background-color: #C0D23E;">
				Color 2
			</div>
			<div class="span2" style="background-color: #933434;color:white;">
				Color 3
			</div>
			<div class="span2" style="background-color: #D3D1D4;">
				Color 4
			</div>
			<div class="span2" style="background-color: #fff;">
				Color 5
			</div>
		</div>
		<br style="clear:both;">
		<h4>Tokyo</h4>
		<div class="span12" style="text-align:center;line-height:30px;">
			<div class="span2" style="background-color: #59B200;color:white;">
				Color 1
			</div>
			<div class="span2" style="background-color: #87FF0F;">
				Color 2
			</div>
			<div class="span2" style="background-color: #468000;color:white;">
				Color 3
			</div>
			<div class="span2" style="background-color: #D3D1D4;">
				Color 4
			</div>
			<div class="span2" style="background-color: #eee;">
				Color 5
			</div>
		</div>
	</div>
</div>';

		$html .= '<input type="hidden" name="'.$this->name.'" id="'.$this->name.'" value="'.$this->value.'" />';

		return $html;
	}
}