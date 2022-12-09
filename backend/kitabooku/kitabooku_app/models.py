from django.db import models

class User(models.Model):
	u_id = models.CharField(max_length=100)
	username = models.CharField(max_length=100)
	email = models.CharField(max_length=100)
	password = models.CharField(max_length=100)
	
class Reader(User):
	xp = models.CharField(max_length=100)
	status = models.CharField(max_length=100)
	rank = models.CharField(max_length=100)
	book_goal = models.CharField(max_length=100)
# The Meta class is used to specify that the model should be pluralized as "notes" instead of the default "notes".
	
#	class Meta:
# 		verbose_name_plural = "readers"


class Admin(models.Model):
	

	
	
	
	
	
