<?
// use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


use App\Models\Hall;


Breadcrumbs::for('halls.index', function (BreadcrumbTrail $trail): void {
    $trail->push('halls', route('halls.index'));
});
Breadcrumbs::for('halls.create', function (BreadcrumbTrail $trail) {
    $trail->push('halls', route('halls.index'));
});
Breadcrumbs::for('halls.show', function (BreadcrumbTrail $trail, Hall $user): void {
    $trail->parent('halls.index');

    $trail->push($user->name, route('halls.show', $user));
});

Breadcrumbs::for('halls.edit', function (BreadcrumbTrail $trail, Hall $user): void {
    $trail->parent('halls.show');

    $trail->push('Edit', route('halls.edit', $user));
});
