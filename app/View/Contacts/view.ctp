<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'contacts', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($question['Contacts']['title'], array('controller' => 'contacts', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Contact')) ?>
<h1><?php echo h($contact['Contacts']['title']) ?></h1>
<div><?php echo nl2br($contact['ContactsContent']['content']) ?></div>
<p><small>Created: <?php echo $contact['Contacts']['created_at'] ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')) ?></p>
