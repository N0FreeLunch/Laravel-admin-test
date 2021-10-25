<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        // The first column displays the id field and sets the column as a sortable column
        $grid->id('ID')->sortable();

        // The second column shows the title field, because the title field name and the Grid object's title method conflict, so use Grid's column () method instead
        $grid->column('title');

        // The third column shows the director field, which is set by the display($callback) method to display the corresponding user name in the users table
        $grid->director()->display(function($userId) {
            return User::find($userId)->name;
        });

        // The fourth column appears as the describe field
        $grid->describe();

        // The fifth column is displayed as the rate field
        $grid->rate();

        // The sixth column shows the released field, formatting the display output through the display($callback) method
        $grid->released('Release?')->display(function ($released) {
            return $released ? 'yes' : 'no';
        });

        // The following shows the columns for the three time fields
        $grid->release_at();
        $grid->created_at();
        $grid->updated_at();

        // The filter($callback) method is used to set up a simple search box for the table
        $grid->filter(function ($filter) {

            // Sets the range query for the created_at field
            $filter->between('created_at', 'Created Time')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
      $form = new Form(new Movie);

      // Displays the record id
      $form->display('id', 'ID');

      // Add an input box of type text
      $form->text('title', 'Movie title');

      $directors = [
          'John'  => 1,
          'Smith' => 2,
          'Kate'  => 3,
      ];

      $form->select('director', 'Director')->options($directors);

      // Add textarea for the describe field
      $form->textarea('describe', 'Describe');

      // Number input
      $form->number('rate', 'Rate');

      // Add a switch field
      $form->switch('released', 'Released?');

      // Add a date and time selection box
      $form->dateTime('release_at', 'release time');

      // Display two time column
      $form->display('created_at', 'Created time');
      $form->display('updated_at', 'Updated time');

        return $form;
    }
}
