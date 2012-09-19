<!-- File: /app/View/Users/add.ctp -->
<script>
	$('.datepicker').datepicker();
</script>

<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>

<div class="deeds form a">
    <fieldset>
        <div>Create a Deed Image</div>	
        <?php
        echo $this->Form->create('Deed');
        echo $this->Form->input('name', array('label' => 'Title:'));
        echo $this->Form->input('description', array('label' => 'Description:<br/><em>250 char limit</em>'));
        echo $this->Form->input('value', array('label' => 'Points you\'ll give:'));
?>
<div class="input-append date dp3" data-date="<?php echo date('m-d-Y', strtotime("+30 days")) ?>" data-date-format="mm-dd-yyyy">
	<?php echo $this->Form->input('expires', array(
            'label' => 'Expiration date:',
            'minYear' => date('Y'),
            'maxYear' => date('Y') + 1,
            'interval' => 15,
            'empty' => true,
        )); ?>
  <span class="add-on"><i class="icon-th"></i></span>
</div>
<?php
        echo $this->Form->input('tags', array('label' => 'Tags (comma sepated):'));
        echo $this->Form->end('Create Deed');
        ?>
    </fieldset>
</div>

<script>
	$(function(){
				window.prettyPrint && prettyPrint();
				$('.dp1').datepicker({
					format: 'mm-dd-yyyy'
				});
				$('.dp2').datepicker();
				$('.dp3').datepicker();
				
				
				var startDate = new Date(2012,1,20);
				var endDate = new Date(2012,1,25);
				$('.dp4').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() > endDate.valueOf()){
							$('#alert').show().find('strong').text('The start date can not be greater then the end date');
						} else {
							$('#alert').hide();
							startDate = new Date(ev.date);
							$('#startDate').text($(this).data('date'));
						}
						$(this).datepicker('hide');
					});
				$('.dp5').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() < startDate.valueOf()){
							$('#alert').show().find('strong').text('The end date can not be less then the start date');
						} else {
							$('#alert').hide();
							endDate = new Date(ev.date);
							$('#endDate').text($(this).data('date'));
						}
						$(this).datepicker('hide');
					});
			});
</script>


