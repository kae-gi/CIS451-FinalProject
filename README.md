# CIS451-FinalProject

**Author:** Kaetlyn Gibson

CIS451, Fall 2020

## See the Project
**Link:** http://ix.cs.uoregon.edu/~kaetlyng/final_project/homePage.html
EDIT: Link is now dead

## Overview
**NOTE:** *SQL database no longer connected, so unfortunately there are no operations that can be performed for the applications. However, the code for these operations still exists.*

Basic model of a hospital management system. There are the included tables: patient, room, hospital, employee, scheduled hours, diagnosis results, bills, and tables describing nurse shifts and doctor shifts. 

Applications included in this model are:
- 1a) calculating patient bill total
- 1b) what makes up that bill
- 2) given a hospital, show where patients are located
- 3) given a hospital, show when and where a nurse employee works and for how many hours for a single week
- 4) given a hospital, show when and where a doctor employee works and for how many hours for a single week
- 5) given a patient, show what their diagnosis is, status is, what hospital they are located, and what doctor diagnosed them

Highlights:
- drop down menus made with a query for each query
application
- button at bottom of pages that allow for easy access back
to home page
- easy access to tables, ER diagram, applications from
home page
- instead of creating multiple php/html pages for my
queries/applications, I linked them by “operation_id” that
corresponds to a “show_operation” function and a
“process_operation” function depending on the application
chosen
