# THE VER1-SQL
---
## REQUESTER TABLE:
Initially called as customer, or tender-er, the requester is a person who requests for a service to be done. A school principal requesting for shirts to be stiched is an example of requester.
* username- the primary key
* password
* mobile
* email

## PROVIDER TABLE:
Initially called as seller, or bidder, the provider is a person who provides a service. A tailor stitching shirts for school is an example of provider.
* username- the primary key
* password
* mobile
* email
* bio - carries some info about the provider's field
* aoi - Area Of Interest: this part contains 3 lettered field names, each separated by a comma.

For example, if kumar shirts is related to fields 'clothing' and 'furniture', his AOI will be 'clo,fur'. We need to maintain a dictionary of field-key values, and each time we read the sql file, the php script needs to convert it into full-field values

# TENDER TABLE
The table for tenders!
* tno- tender id, primary key
* title - title of tender
* aoi - area of interest
* status - 0:closed, 1:live, any other number: sanctioned
* description - description, terms and conditions of tender
* start - tender start date
* end - tender deadline
* creator - the username of service requester who created this tender

# BID TABLE
The table for bids!
* bno - bid number
* tno - tender number related to the bid
* bidder - the username of the service provider/bidder
* amount - amount  bid
* description - description of bid
* title - title of bid
