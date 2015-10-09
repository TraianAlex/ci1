<div id="content">
       <?php if (validation_errors()) : ?>
            <?=validation_errors(); ?>
        <?php endif; ?>

        <?=form_open('contact', $form['attributes']); ?>

        <table>
            <tr>
                <td><?=form_label($form['contact_name']['label']['text'],
                                 $form['contact_name']['label']['for']); ?></td>
                <td><?=form_input($form['contact_name']['field']); ?></td>
            </tr>

            <tr>
                <td><?=form_label($form['contact_email']['label']['text'],
                                 $form['contact_email']['label']['for']); ?></td>
                <td><?=form_input($form['contact_email']['field']); ?></td>
            </tr>

            <tr>
                <td><?=form_label($form['contact_message']['label']['text'],
                                 $form['contact_message']['label']['for']); ?></td>
                <td><?=form_textarea($form['contact_message']['field']); ?></td>
            </tr>

            <tr>
                <td colspan="3"><?=form_submit('mysubmit', 'Send'); ?></td>
            </tr>

        </table>

        <?=form_close(); ?>

        Send email to all users <?=anchor('contact/multiple_email', 'Send to all users');?>
</div>