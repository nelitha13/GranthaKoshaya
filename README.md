# GranthaKoshaya | ග්‍රන්ථකෝෂය 📖

# Introduction

A library system is essential for a country. Although Sri Lanka\'s
library system is currently in good condition. With the advancement of
technology, the library also needs to be digitized. Many people missed
this library because they should have stayed at home last few years. I
thought of creating this GranthaKoshaya eLibrary System as a solution to
this.

GranthaKoshaya eLibrary is library that stores content digitally and is
accessible by any device any place and any time. eLibrary retrieves
comprehensive yet accurate information that is 100% secure and
virus-free, delivering it instantly at the click of the mouse across the
internet. This efficient and interactive software solution, boasts the
most up-to-date information on every subject that is quickly retrievable
by keying in some elementary fields in the search options.

e-Library users can select searches in both Intranet and Internet model
catalog for titles, authors, subjects or type keywords to describe an
item they would like to find. If the search finds items, the system will
show which collection the items are in and if they are available to
check out.

GranthaKoshaya Library Collections contain e-Documents all accessible
simultaneously by all users. It offers the world\'s largest collection
of downloadable electronic books.

# Background and Motivation

I have wanted to provide a service to Sri Lanka using new technology for
a long time. In between, I got to know about this competition from a
message received from the school. This inspired me to create a system
like this.

# Problem in Brief

One of the biggest problems with the library system in Sri Lanka is that
it is difficult to manage books properly. Due to this, when
students/customers get the books, notifying them about the dates to be
returned, incidents such as non-delivery of books after they have been
given can be reported.

The main problems of Normal Libraries are as follows:

-   Growing mistrust of government

-   The disappearing middle class

-   The decline in reading

-   Lack of recognition

-   The struggle of library education

# Aim & Objective

## Aim

Provide a good service to Sri Lanka using new technology.

## Objective

The main objectives of e-Libraries are as follows:

-   Revival of reading and learning culture in general public,
    especially youth, families and senior citizens

-   Inculcate e-reading and e-learning culture amongst general public,
    students, teachers and our society at large

-   Establish a centralized Digital Library of e-books and
    documentaries.

-   Explore and provide free, purchased, subscribed and indigenous
    e-resources.

-   Encourage and persuade authors/publishers to provide e-Version of
    their publications for free reading and paid.

-   Provide remote access to general public to top read international
    e-collections.

-   Economize access to knowledge

# Advantages of e-library

-   No physical boundary: Since digital library is only a software and
    the materials are digital, the system can function anywhere in the
    institution with access to PC and LAN.

-   Round-the-clock availability: Users can access the materials at any
    time within the institution\'s network.

-   Multiple accesses: The same resources can be used at the same time
    by a number of users.

-   Structured approach: e-library provides access to much richer
    content in a more structured manner, via main/sub/specific
    categories making the task of management of materials very easy for
    the librarian.

-   Information retrieval: The system facilitates more flexibility and
    ease in searching a specific book or article. Simple or advance
    search options are available with options to use keywords, title,
    author, content, date, rating etc. as criteria.

-   Preservation and conservation: An exact copy of the original can be
    made any number of times without any degradation in quality.

-   Space: While traditional libraries are limited by storage space,
    digital libraries have the potential to store much more information
    simply because digital information requires very little physical
    space to contain it.

-   Innovative technology: Digital libraries can immediately adopt
    innovations in technology providing users with improvements in
    electronic and audio book technology. Upgraded versions will be made
    available to the existing clients as and when they are done.

-   Cost: The cost of maintaining a digital library is lower than that
    of a traditional library. A traditional library must spend large
    sums of money paying for staff, book maintenance, rent, and
    additional books, while digital libraries do away with these fees.

-   Other features: Different user types can be created with varying
    access restrictions. Articles can be rated by the user and
    discussion forums can be created.

# System Requirements

1.  ## Non-Functional Requirements

    1.  ### Efficiency Requirement

> When a library management system will be implemented librarian and
> user will easily access library as searching and book transaction will
> be very faster.

### Reliability Requirement

> The system should accurately perform member registration, member
> validation, report generation, book transaction and search

### Usability Requirement

> The system is designed for a user-friendly environment so that student
> and staff of library can perform the various tasks easily and in an
> effective way.

### Implementation Requirements

> In implementing whole system, it uses HTML in front end with PHP as
> server-side scripting language which will be used for database
> connectivity and the backend is the database part is developed using
> MySQL.

2.  ## Functional Requirements

    1.  ### ![](vertopal_3d6dbdcc27784021a9dec4116ff93411/media/image3.png)User Login

> This feature used by the user to login into system. They are required
> to enter user id and password before they are allowed to enter the
> system. The user id and password will be verified and if invalid id is
> their user is allowed to not enter the system.

-   User id is provided when they register.

-   The system must only allow user with valid id and password to enter
    the system.

-   The system performs authorization process which decides what user
    level can access to.

-   The user must be able to logout after they finished using system.

    1.  ### ![](vertopal_3d6dbdcc27784021a9dec4116ff93411/media/image4.png)Register New User

> This feature can be performed by all users to register new user to
> create account.

-   System must be able to verify information.

-   System must be able to delete information if information is wrong.

    1.  ### ![](vertopal_3d6dbdcc27784021a9dec4116ff93411/media/image5.png)}Search Book

> This feature is found in book maintenance part. we can search book
> based on book id, book name, publication or by author name.

-   System must be able to search the database based on select search
    type.

-   System must be able to filter book based on keyword entered.

-   System must be able to show the filtered book in book view.

    1.  ### ![](vertopal_3d6dbdcc27784021a9dec4116ff93411/media/image6.png)Add New Book

> This feature allows to add new books to the library. Only
> administrators can use this feature.

-   System must be able to verify information.

-   System must be able to enter number of copies into table.

-   System must be able to not allow two books having same book id.

    1.  ### ![](vertopal_3d6dbdcc27784021a9dec4116ff93411/media/image7.png)Add New Author

> This feature allows to add new authors to the library. Only
> administrators can use this feature.

-   System must be able to verify information.

-   System must be able to not allow two authors having same authors
    id.[]{#_Toc111187787 .anchor}

# Used Technologies

-   Front end

    -   HTML

    -   CSS

    -   Bootstrap CSS Framework

    -   PHP

    -   JavaScript

-   Apache with XAMPP (For local)

    -   (For online)

```{=html}
<!-- -->
```
-   Database - MySQL

-   Code Editor -- Microsoft Visual Studio Code 2022

-   Version Controller -- GitHub

-   Bootstrap Icons[]{#_Toc111187788 .anchor}

# System Design

The system is divided into two parts, the first part is SearchSystem
side with database represent the server, and the

second part isthe E-Library User Interfaceside that represents the
client by using PHP , MYSQL and APACHE with WAMP

server. System diagram and system database diagram are illustrated in
Figures (1,a) and (1,b) respectively.


The system is divided into two parts, the first part is Admin side with
database represent the server, and the second part is the User Interface
side that represents the client by using PHP, MYSQL and APACHE with
XAMPP server. System diagram and system database diagram are illustrated
in Figure.

The system is divided into two parts, the first part is SearchSystem
side with database represent the server, and the

second part isthe E-Library User Interfaceside that represents the
client by using PHP , MYSQL and APACHE with WAMP

server. System diagram and system database diagram are illustrated in
Figures (1,a) and (1,b) respectively.

The system is divided into two parts, the first part is SearchSystem
side with database represent the server, and the

second part isthe E-Library User Interfaceside that represents the
client by using PHP , MYSQL and APACHE with WAMP

server.



# System Implementation

If this is used in a school library, it can first be tested with its
existing manual system and then completely switch to this new system.
Otherwise, only one section (e.g. - primary section) can be implement
using this new system after checking section by section.

If this is used in a bookshop, it is best to use this new system over
time after using it in parallel with the existing manual system.

## Online - <https://granthakoshaya.000webhostapp.com/>

## Local

1.  Install XAMPP or another cross-platform web server to your computer.

2.  Start MY SQL & Apache from Control Panel.

3.  Then, Move the main project folder to this folder.
    "C:\\xampp\\htdocs"

4.  <http://127.0.0.1/phpmyadmin/> go to phpMyAdmin.

5.  Create New Database and Enter \"granthakoshaya\" for Database Name &
    Create.

6.  Open the "granthakoshaya.sql" file & Copy text on it.

7.  Go to SQL Tab in phpMyAdmin & paste text that you have copied.

8.  Finally, Run "index.php" File
    from <http://127.0.0.1/GranthaKoshaya/index.php>

# Conclusion

This website provides a computerized version of library management
system which will benefit the students as well as the staff of the
library. It makes entire process online where student can search books,
staff can view reports and do book transactions. It also has a facility
for student/customer login where student/customer can login and can
order books to doorstep.

# Future Scope

There is a future scope of this facility that many more features such as
short notes can be added by the school teachers as well as online
assignments submission facility, a feature of students can request books
from chat with admins and requesting notes from chat with teachers. And
also give support for audiobooks. I expected to GranthaKoshaya is best
library system of Sri Lanka.