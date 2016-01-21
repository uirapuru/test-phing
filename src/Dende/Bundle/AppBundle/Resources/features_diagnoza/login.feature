Feature: I log in to matura-diagnoza.nowaera.pl

  Scenario: I try to log in using wrong password
    Given I am on "/login"
    When I fill in "_username" with "error_login"
    And I fill in "_password" with "some_password"
    And I press "Zaloguj"
    Then I should see "Błąd"
    And I should see "Błędny login lub hasło"

  Scenario: I try to log in using good password
    Given I am on "/login"
    When I fill in "_username" with "admin@vm.pl"
    And I fill in "_password" with "vmteacher"
    And I press "Zaloguj"
    Then I should not see "Błąd"
    And I should not see "Błędny login lub hasło"
    And I should be on "/#profile"
    And I should see "Marysia Adminowa"

  Scenario: I try to log in and log out correctly
    Given I am on "/login"
    When I fill in "_username" with "admin@vm.pl"
    And I fill in "_password" with "vmteacher"
    And I press "Zaloguj"
    Then I should not see "Błąd"
    And I should be on "/#profile"
    And I wait to see "Marysia Adminowa"
    Then I press login out button
    And I should be on "/login"

