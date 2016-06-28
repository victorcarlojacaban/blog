Feature: Testing
	In order to prove that Behat works as intended
	We want to test the home page for a phrase


Scenario: Register a user
	Given I am on registration page
	And I fill in "name" with "lebron"
	And I fill in "email" with "lebron@yahoo.com"
	And I fill in "password" with "123456"
	And I fill in "password_confirmation" with "123456"
	Then I am logged in
