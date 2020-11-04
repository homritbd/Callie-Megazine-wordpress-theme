<div class="section-title">
<h3 class="title">
	<?php 
			$callie_comments = get_comments_number();

			if(1==$callie_comments){
				_e('1 Comment', 'callie');
			}else{
				echo wp_kses_post($callie_comments).' '. __('Comments', 'callie');
			}
	?>
</h3>
<div class="post-comments">
<?php 
		$callie_comment_list = wp_list_comments(
			array(
				'echo'		=>false
		)
	);

	$callie_comment_list = str_replace('avatar avatar-32 photo', 'media-object', $callie_comment_list);
	$callie_comment_list = str_replace('comment-body', 'media media-author', $callie_comment_list);
	$callie_comment_list = str_replace('fn', 'media-heading', $callie_comment_list);
	echo wp_kses_post($callie_comment_list);


		if(!comments_open()){
			_e('Comments are closed', 'callie');
		}

?>
</div>

<div class="comments-pagination">
	<?php 

			the_comments_pagination(array(
				'screen_reader_text'		=>' ',
				'Prev_text'					=>__('Previous comments', 'callie'),
				'next_text'					=>__('Next comments', 'callie'),
			));
		?>
</div>

</div>
		


			<!-- post reply -->
			<div class="section-row">
				<div class="section-title">
					<h3 class="title"><?php _e('Leave a Reply', 'callie'); ?></h3>
				</div>

				<?php

				$callie_comment_fields = array();
				$flowapp_message_field_placeholder = __('Message', 'callie');
				$flowapp_name_field_placeholder = __('Name', 'callie');
				$flowapp_email_field_placeholder = __('Email', 'callie');
				$flowapp_website_field_placeholder = __('Website', 'callie');
				$flowapp_submit_field_placeholder = __('Submit', 'callie');
				$callie_comment_field = <<<END_OF_STRING
	
					<div class="col-md-12">
						<div class="form-group">
							<textarea class="input" name="message" placeholder="{$flowapp_message_field_placeholder}*"></textarea>
						</div>
					</div>

				END_OF_STRING;
					$callie_comment_fields['author'] = <<<END_OF_STRING
					<div class="col-md-4">
					<div class="form-group">
						<input class="input" type="text" name="name" placeholder="{$flowapp_name_field_placeholder}*">
					</div>
				</div>
				END_OF_STRING;

					$callie_comment_fields['email'] = <<<END_OF_STRING
					<div class="col-md-4">
					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="{$flowapp_email_field_placeholder}*">
					</div>
				</div>
				END_OF_STRING;

					$callie_comment_fields['url'] =<<<END_OF_STRING
					<div class="col-md-4">
					<div class="form-group">
						<input class="input" type="text" name="website" placeholder="{$flowapp_website_field_placeholder}">
					</div>
				</div>
				END_OF_STRING;

					$callie_comment_submit_button = <<<END_OF_STRING
					<div class="col-md-12">
					<button class="primary-button">$flowapp_submit_field_placeholder</button>
				</div>
				END_OF_STRING;

					$callie_comment_argument = array(
							'fields'		=>$callie_comment_fields,
							'comment_field'	=>$callie_comment_field,
							'submit_button'	=>$callie_comment_submit_button,
							'class_form'	=>'post-reply',
							'title_reply'	=>''
					);
	comment_form($callie_comment_argument);

	?>

</div>
<!-- /post reply -->