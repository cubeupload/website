function User(data)
{
	this.id 		= ko.observable(data.id);
	this.name 		= ko.observable(data.name);
	this.username 	= ko.observable(data.username);
	this.email 		= ko.observable(data.email);
	this.created_at = ko.observable(data.created_at);
	this.updated_at = ko.observable(data.updated_at);
}

function UserListViewModel()
{
	var self = this;
	self.users = ko.observableArray([]);

	$.getJSON('/admin/users', function( data )
	{
		var mappedUsers = $.map(data, function(item){ return new User( item ) } );
		self.users(mappedUsers);
	});
}