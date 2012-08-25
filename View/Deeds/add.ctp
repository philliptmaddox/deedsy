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
		echo $this->Form->input('expires', array(
            'label' => 'Expiration date:',
            'minYear' => date('Y'),
            'maxYear' => date('Y') + 1,
            'interval' => 15,
            'empty' => true,
        ));

        echo $this->Form->input('tags', array('label' => 'Tags (comma sepated):'));
        echo $this->Form->end('Create Deed');
        ?>
    </fieldset>
</div>

<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="mm-dd-yyyy">
  <input class="span2" size="16" type="text" value="12-02-2012">
  <span class="add-on"><i class="icon-th"></i></span>
</div>

<script>
	$(function(){
				window.prettyPrint && prettyPrint();
				$('#dp1').datepicker({
					format: 'mm-dd-yyyy'
				});
				$('#dp2').datepicker();
				$('#dp3').datepicker();
				
				
				var startDate = new Date(2012,1,20);
				var endDate = new Date(2012,1,25);
				$('#dp4').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() > endDate.valueOf()){
							$('#alert').show().find('strong').text('The start date can not be greater then the end date');
						} else {
							$('#alert').hide();
							startDate = new Date(ev.date);
							$('#startDate').text($('#dp4').data('date'));
						}
						$('#dp4').datepicker('hide');
					});
				$('#dp5').datepicker()
					.on('changeDate', function(ev){
						if (ev.date.valueOf() < startDate.valueOf()){
							$('#alert').show().find('strong').text('The end date can not be less then the start date');
						} else {
							$('#alert').hide();
							endDate = new Date(ev.date);
							$('#endDate').text($('#dp5').data('date'));
						}
						$('#dp5').datepicker('hide');
					});
			});
</script>


