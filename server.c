#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <sys/time.h>
#include <time.h>
#include <pthread.h>
#include <netdb.h>
#include <mysql/mysql.h>

#define PORT 5000
#define BUFSIZE 1024

//Compilation : $ gcc -o server server.c `/opt/lampp/bin/mysql_config --cflags --libs`
//Compilation : $ gcc -I/opt/lampp/include  -o server_soc server_soc.c `/opt/lampp/bin/mysql_config --cflags --libs` 
 
struct member mainproc(struct member mainmemberob);
struct member addmproc(struct member mainmemberob);
void addsproc(struct member mainmemberob);
struct member chekproc(struct member mainmemberob);
struct member getstmtproc(struct member mainmemberob);
struct member srchproc(struct member mainmemberob); 
 
void bbzero(char * strg);
int strchNo(char arr[]); 
int strbg(char strn[]); 
 
//=======member structure============== 
struct member { 
            char messageStr[1200]; 
            char memberName[80];
            char memberID[30];
	        char enrollmentDate[30];
            char memberRecommender[30]; 
            char memberGender[12];
            char agentUsername[30];
            char agentDistrict[20];
            int  recommendedMembers; 
            char agentSignature[30];
	        int portNo;
	        char daterecv[15];
	        char timerecv[15];  
         }; 
	//structure instances 
	struct member s_memberob;
	struct member memberobret; 
	struct member ret_structr;
//=======member structure end===========
 
FILE *fileptrstatus;
FILE *sgnsfile;
FILE *mbrsfile;

 time_t t; struct tm tmm;

int ras=0,bbg=0,bgg=0,ddx,end=9,ix=0,min,newMin,prior1pos,ax,sh=0,vvx, iix, occ, xi, maxoc, newMax,c,hh,cm, occurr[10]; 
int ixx,cxx,x,zx,maxpos,cmpp,i1,i2,i3,i4,bxxx,rp,op=0,nextready=0,secs,starttime,curtime,bggr=0,endr=9,headerprinted=0;
int wa,wa2,wa3,wa4;
int fdmax,sockfd,jjn;
fd_set master;
//========================================
	MYSQL *conn;
	MYSQL_RES *rset; 
	MYSQL_ROW row;
	static char *host = "127.0.0.1";
	static char *user = "root";
	static char *pass = "";
	static char *dbname = "recess_political_party"; 
	unsigned int mysqlport = 3306;
	static char *unix_socket = NULL;
	unsigned int flag = 0;
	char querr1[500],querr2[500],querr2b[500],querr3[100];
//========================================

void send_to_all(int j, int sockfd,  struct member ret_structr, fd_set *master) { //sending to all
	if (FD_ISSET(j, master)){
		if (j != sockfd) {
			if (send(j, &ret_structr, sizeof(ret_structr), 0) == -1) {
				perror("send");
		} } } } //......................................................................
		
void new_recv(int i, fd_set *master, int sockfd, int fdmax,struct sockaddr_in my_addr,struct sockaddr_in client_addr)//sending and receiving fuction
{  
    
    t = time(NULL); tmm =  *localtime(&t);
	int nbytes_recvd, j;
	char msgvar[1200], recv_buf[BUFSIZE], buf[BUFSIZE]; 
	if ((nbytes_recvd = read(i, &s_memberob, sizeof(s_memberob))) <= 0) {
		if (nbytes_recvd == 0) { printf("socket %d hung up\n", i);
		}else { perror("recv"); }
		close(i);
		FD_CLR(i, master);
	}else {   
	      //assign time recieved : 
	      //strcpy(s_memberob.timerecv,((char *)t));
	
	                                                         if(headerprinted==0){
	//printf("\nmember_name |  gender  | recommender |  Date    |   Time |");
	printf("\n============================================================="); headerprinted=1;
	                                                            }
	     //access all the fields of the recieved object from s_memberob
	     printf("\nReceived request --------------------------------------");
	     printf("\n%s\nFrom agent : %s\nDistrict : %s\n",s_memberob.messageStr,s_memberob.agentUsername,s_memberob.agentDistrict);
	     
	      // *********for debuging purposes**********/
	     printf("\n==========received=====\n messageStr : ------- %s -----\n memberName: -------- %s -----\n memberID : --------- %s -----\n enrollmentDate: ---- %s -----\n memberRecommender: - %s -----\n memberGender : ----- %s -----\n agentUsername: ----- %s -----\n agentDistrict : ---- %s -----\n recommendedMembers : %d -----\n agentSignature : --------- %s -----\n portNo : ----------- %d -----\n daterecv : --------- %s -----\n timerecv : --------- %s -----\n======================",
	     		s_memberob.messageStr,s_memberob.memberName,s_memberob.memberID,s_memberob.enrollmentDate,s_memberob.memberRecommender,s_memberob.memberGender,s_memberob.agentUsername,s_memberob.agentDistrict,s_memberob.recommendedMembers,s_memberob.agentSignature,s_memberob.portNo,s_memberob.daterecv,s_memberob.timerecv );
	      //*********for debuging purposes**********
	     
  }  }//...............................end of new_recv() function.......................................
		
void connection_accept(fd_set *master, int *fdmax, int sockfd, struct sockaddr_in *client_addr)
{
	socklen_t addrlen;
	int newsockfd; 	
	addrlen = sizeof(struct sockaddr_in);
	if((newsockfd = accept(sockfd, (struct sockaddr *)client_addr, &addrlen)) == -1) {
		perror("accept"); exit(1);
	}else {
		FD_SET(newsockfd, master);
		if(newsockfd > *fdmax){  *fdmax = newsockfd;  }
        printf("\nNew client connection from %s on port %d \n",
        inet_ntoa(client_addr->sin_addr), ntohs(client_addr->sin_port));
	}
 headerprinted=0;
}
	
void connect_request(int *sockfd, struct sockaddr_in *my_addr)
{
	int yes = 1;
		
	if ((*sockfd = socket(AF_INET, SOCK_STREAM, 0)) == -1) {
		perror("Socket"); exit(1); } 
	my_addr->sin_family = AF_INET;
	my_addr->sin_port = htons(5000);
	my_addr->sin_addr.s_addr = INADDR_ANY;
	memset(my_addr->sin_zero, ' ', sizeof my_addr->sin_zero);
		
	if (setsockopt(*sockfd, SOL_SOCKET, SO_REUSEADDR, &yes, sizeof(int)) == -1) {
		perror("setsockopt"); exit(1); }
		
	if (bind(*sockfd, (struct sockaddr *)my_addr, sizeof(struct sockaddr)) == -1) {
		perror("Unable to bind"); exit(1); }
	if (listen(*sockfd, 10) == -1) { perror("listen"); exit(1); }
	printf("\nServer Waiting for client on port 5000 .....");
	fflush(stdout);
}

int main(){

	//fd_set master;   //declared globally instead.
	fd_set read_fds;
	int i;
	sockfd= 0;
	struct sockaddr_in my_addr, client_addr;
	FD_ZERO(&master);
	FD_ZERO(&read_fds); 
	connect_request(&sockfd, &my_addr);
	
	FD_SET(sockfd, &master); 
	fdmax = sockfd;
	 
	while(1){ 
		read_fds = master;
		if(select(fdmax+1, &read_fds, NULL, NULL, NULL) == -1){ perror("select"); exit(4); }
		
		for (i = 0; i <= fdmax; i++){
			if (FD_ISSET(i, &read_fds)){
				  if (i == sockfd)
					connection_accept(&master, &fdmax, sockfd, &client_addr);
				  else
					new_recv(i, &master, sockfd, fdmax,my_addr, client_addr);
			 }
		}//end for loop
	//******************************* processing ******************************** 
		  //*********=======calling main processor to process========************  
			  ret_structr = mainproc(s_memberob);
			  
			  strcpy(ret_structr.agentUsername,s_memberob.agentUsername);
			  strcpy(ret_structr.agentDistrict,s_memberob.agentDistrict);
 				
   			  //call the send to all function after processing
		      for (jjn = 0; jjn <= fdmax; jjn++){ 
			       send_to_all(jjn, sockfd, ret_structr, &master ); 
		       } bbzero(ret_structr.messageStr); bbzero(ret_structr.agentUsername);
		  //********************************************	
	}//end while(1)
	 
	return 0;
} //end of main() function 
//===============================================================================================================================

struct member mainproc(struct member mainmemberob){
    int a,bg,b,c=0;
    char cmmd[5],messageStrcopy[1200],singlememberStr[1200];
    time_t strtm,finitm,processingdur;
    struct timeval start, end; 
    long mtime, mstime, seconds, useconds;    
 
    gettimeofday(&start, NULL);
    usleep(2000);
     gettimeofday(&end, NULL); 
       seconds  = end.tv_sec  - start.tv_sec;
       useconds = end.tv_usec - start.tv_usec; 
       mtime = seconds + useconds;
       mstime = useconds; 
     
    for(a=0;a<4;a++){ sprintf(&cmmd[a],"%c",mainmemberob.messageStr[a]); }

    struct member agentsResponse;
    struct member pasdmember; 
    pasdmember = mainmemberob;
      sprintf(&cmmd[0],"%c",mainmemberob.messageStr[0]);
      sprintf(&cmmd[1],"%c",mainmemberob.messageStr[1]);
      sprintf(&cmmd[2],"%c",mainmemberob.messageStr[2]);
      sprintf(&cmmd[3],"%c",mainmemberob.messageStr[3]);


       if(strcmp(cmmd,"addm")==0 || strcmp(cmmd,"Addm")==0){ 
                  agentsResponse = addmproc(pasdmember);
       }else if(strcmp(cmmd,"chec")==0 || strcmp(cmmd,"Chec")==0){
                  agentsResponse = chekproc(pasdmember);
       }else if(strcmp(cmmd,"get_")==0 || strcmp(cmmd,"Get_")==0){
                 agentsResponse = getstmtproc(pasdmember);
       }else if(strcmp(cmmd,"adds")==0){ 
       			addsproc(pasdmember);
       }else if(strcmp(cmmd,"sear")==0 || strcmp(cmmd,"Sear")==0){
                  agentsResponse = srchproc(pasdmember);
       }else{
         //unknown command.
       }   
        
    return agentsResponse;

}/*end of mainproc function*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

struct member addmproc(struct member mainmemberob){
		MYSQL *aconn;
		MYSQL *aconn2;
		aconn = mysql_init(NULL);
		MYSQL_RES *rset;
		MYSQL_RES *rset2; 
		MYSQL_ROW row;
		FILE *asgnsfile;
		FILE *statusfp;
		int rows_affected,n=0,i,signature_not_exists=0;
		char querr1[500],querr2[500],querr2b[500],querr3[100],entered_signature[2],sign_auth_passed[4];
		char signatr[4],signaturesymbol[30],memberIDvar[30];
		char strtoken1[15],strtoken2[15],strtoken3[15],recommendertoken6[30],gendertoken5[30],datetoken4[30];
		 strcpy(strtoken1 , strtok(mainmemberob.messageStr, " ")); 
		 strcpy(strtoken2 , strtok(NULL, " ")); //first name
		 strcpy(strtoken3 , strtok(NULL, " ")); //second name
		 strcpy(datetoken4 , strtok(NULL, " "));
		 strcpy(gendertoken5 , strtok(NULL, " "));
		 strcpy(recommendertoken6 , strtok(NULL," "));
		 strcpy(mainmemberob.memberName,"");
		 strcat(mainmemberob.memberName,strtoken2);
		 strcat(mainmemberob.memberName," ");
		 strcat(mainmemberob.memberName,strtoken3); 
		 sprintf(mainmemberob.enrollmentDate,"%s",datetoken4);
		 sprintf(mainmemberob.memberGender,"%s",gendertoken5);
		 sprintf(mainmemberob.memberRecommender,"%s",recommendertoken6); 
	  	 if(strcmp(mainmemberob.memberID,"")==0){ //generate the member id
	  		sprintf(memberIDvar,"%c%c%c%d%ld",mainmemberob.agentDistrict[0],mainmemberob.agentDistrict[1],mainmemberob.agentDistrict[2],0,(time(NULL)%100));
	  		strcpy(mainmemberob.memberID,memberIDvar); 
	  	 }
	  	 
		//sprintf(querr1,"CREATE TABLE if not exists members(memberName varchar(30), memberID varchar(30), enrollmentDate varchar(30), memberRecommender varchar(30),memberGender varchar(12),enrolledBy varchar(30),districtName varchar(30),recommendedMembers int(11))"); 
	 	 //mysql_query(aconn,(querr1)); 
	  	/*connecting to the database. NB: the function mysql_real_connect(..) returns 0 upon success and non zero when failed. */		 
	  	/*Open connection*/
	  	aconn2 = mysql_init(NULL);
		if(!(mysql_real_connect(aconn2,host,user,pass,dbname,mysqlport,unix_socket,flag))){ fprintf(stderr,"Error !! : %s\n",mysql_error(aconn2) ); 
		}else{  printf("\n Verifying the signature ... '%s'",mainmemberob.agentSignature); } 
	  	if(!strcmp(mainmemberob.agentSignature," * * ***** ** *")){ strcpy(entered_signature,"A");
	  	}else if(!strcmp(mainmemberob.agentSignature,"** * *** * *** ")){ strcpy(entered_signature,"B");
	  	}else if(!strcmp(mainmemberob.agentSignature," ***  *  *   **")){ strcpy(entered_signature,"C");
	  	}else if(!strcmp(mainmemberob.agentSignature,"** * ** ** *** ")){ strcpy(entered_signature,"D");
	  	}else if(!strcmp(mainmemberob.agentSignature,"****  ****  ***")){ strcpy(entered_signature,"E");
	  	}else if(!strcmp(mainmemberob.agentSignature,"****  ****  *  ")){ strcpy(entered_signature,"F");
	  	}else if(!strcmp(mainmemberob.agentSignature," ***  * ** * **")){ strcpy(entered_signature,"G");
	  	}else if(!strcmp(mainmemberob.agentSignature,"* ** ***** ** *")){ strcpy(entered_signature,"H");
	  	}else if(!strcmp(mainmemberob.agentSignature,"*** *  *  * ***")){ strcpy(entered_signature,"I");
	  	}else if(!strcmp(mainmemberob.agentSignature,"***  *  ** ****")){ strcpy(entered_signature,"J");
	  	}else if(!strcmp(mainmemberob.agentSignature,"*  *  *  *  ***")){ strcpy(entered_signature,"L");
	  	}else{strcpy(entered_signature,"X"); } 
	  	sprintf(querr3,"SELECT signatre FROM agents where agentUsername like '%c%c%c%c%c' and signatre='%s' limit 1",mainmemberob.agentUsername[0],mainmemberob.agentUsername[1],mainmemberob.agentUsername[2],mainmemberob.agentUsername[3],'%',entered_signature); 
	  	if(!mysql_query(aconn2,querr3)){printf(" ........Passed . ");}else{printf(" .............Failed . "); }  
	  	rset2 = mysql_store_result(aconn2);  
		while((row = mysql_fetch_row(rset2))!=NULL){sprintf(&signatr[0],"%c",row[0][0]); signature_not_exists++; }
		mysql_free_result(rset2);  
		mysql_close(aconn2);   
		  
		// organising the signature into a desired format
		for(i=0;i<strlen(mainmemberob.agentSignature);i++){ 
			sprintf(&signaturesymbol[i+n],"%c",mainmemberob.agentSignature[i]);
			if((i+1)%3==0){ sprintf(&signaturesymbol[i+n+1],"%c",'\n'); n=n+1; }
 		}//finished organising the signature into a desired format
 		
		if(strcmp(entered_signature,"X")){ 
			if(!signature_not_exists){ 
				puts("\n !! Wrong signature, not written to the file .");  
				strcpy(sign_auth_passed,"No");
				 //write message string to the file members.txt
			 	mbrsfile = fopen("storage/app/members.txt","a");
			 	fprintf(mbrsfile,"%c+++++++++++++++++++++++++++",'\n');
				fprintf(mbrsfile,"%c%s: %s%cBy agent : %sDistrict : %sSignature authentication passed ?: %s%c",'\n'," Adding member Failed: ",mainmemberob.memberName,'\n',mainmemberob.agentUsername,mainmemberob.agentDistrict,sign_auth_passed,'\n');
			   	fclose(mbrsfile); 
			}else{  
				if(!(mysql_real_connect(aconn,host,user,pass,dbname,mysqlport,unix_socket,flag))){ 
					fprintf(stderr,"Error !! : %s\n",mysql_error(aconn) ); printf("\n !! Problem occured while trying to add member: '%s' .",mainmemberob.memberName); 
				}else{  printf("\n Adding member ... %s",mainmemberob.memberName); } 
			  	sprintf(querr2,"INSERT INTO members set memberName='%s', memberID='%s', enrollmentDate='%s', memberRecommender='%s',memberGender='%s',enrolledBy='%s',districtName='%s',recommendedMembers='%d'",mainmemberob.memberName,mainmemberob.memberID,mainmemberob.enrollmentDate,mainmemberob.memberRecommender,mainmemberob.memberGender,mainmemberob.agentUsername,mainmemberob.agentDistrict,0);   
			  	if(!mysql_query(aconn,(querr2))){printf(".........Ok .");}else{printf("..............Failed");};  
			  	sprintf(querr2b,"UPDATE districts set no_of_members=(no_of_members+1) where districtName like '%c%c%c%c%c'",mainmemberob.agentDistrict[0],mainmemberob.agentDistrict[1],mainmemberob.agentDistrict[2],mainmemberob.agentDistrict[3],'%'); 
			  	rows_affected=mysql_query(aconn,(querr2b));
			  	mysql_close(aconn); // first close the connection to db
			  	//-------
				puts("\n Writing signature to a file ++++++++++++++++++++++++++Ok .");  
			  	asgnsfile = fopen("storage/app/signitures.txt","a");   
			  	fprintf(asgnsfile,"%s %c By agent: %s Member added: %s%c",signaturesymbol,'\n',mainmemberob.agentUsername,mainmemberob.memberName,'\n');
			  	fclose(asgnsfile);
			  	strcpy(sign_auth_passed,"Yes");
			  	
			  	//write message string to the file members.txt
			 	mbrsfile = fopen("storage/app/members.txt","a");
			 	fprintf(mbrsfile,"%c--------------------------------------",'\n');
				fprintf(mbrsfile,"%c%sBy agent : %sDistrict : %sSignature authentication passed ? .............%s%c",'\n',mainmemberob.messageStr,mainmemberob.agentUsername,mainmemberob.agentDistrict,sign_auth_passed,'\n');
			   	fclose(mbrsfile);
		   	 
		  	}
		 	 
		   	 //write status info to the file status.txt
		 	 statusfp = fopen("storage/app/status.txt","a");
		 	 fprintf(statusfp,"%c=-------------------",'\n');
			 fprintf(statusfp,"%c Agent : .... %s%c Signed : ... %s%c",'\n',mainmemberob.agentUsername,'\n',sign_auth_passed,'\n');
		   	 fclose(statusfp);
       	 }else{printf("\n Signature entered by agent '%s' does not exist ",mainmemberob.agentUsername);}//end of if 
       printf("\n Processing Done . \n_________________________________________________________________________________");
		return mainmemberob;
    }
    
void addsproc(struct member mainmemberob){ 
	  //"""""""""""""""""
	  	char messageStrcopy[1200],response_msg_queue[1200],singlememberStr[120];
	  	int i,jjn,xx=0,jumps=0;
	    bbzero(messageStrcopy);  
       			  
       			  struct member tempmember; 
    			  tempmember = mainmemberob; 
    			  strcpy(tempmember.memberRecommender,"none");
       			  for(i=5;i<strlen(mainmemberob.messageStr);i++){ messageStrcopy[i-5] = mainmemberob.messageStr[i]; }
       			   
       			   strcpy(response_msg_queue,"");
       			   for(i=0;i<strlen(messageStrcopy);i++){ 
		   			   	if(messageStrcopy[i]==';'){  
		   			   		//call addmproc 
		   			   		strcpy(tempmember.messageStr,"addmember "); 
		   			   		strcat(tempmember.messageStr,singlememberStr); 
		   			   		//call the addmproc() with this ready single member .
		   			   		ret_structr = addmproc(tempmember);
		   			   		strcat(response_msg_queue,ret_structr.messageStr); 
		   			   		bbzero(mainmemberob.messageStr);
		   			   		bbzero(singlememberStr);  
		   			        xx += (jumps+1);  
		   			        jumps=0;
		   			   	}else{ jumps++;  //count the times we didnt meet if condition above, hence stepped here.
		   			   		singlememberStr[i-xx]=messageStrcopy[i];  
		   			   	}
       			   }//end of for loop 
       			   strcpy(ret_structr.messageStr,response_msg_queue);
       			   //send the new ret_structr and then continue looping .+++++++++++++++++
   			   		for(jjn = 0; jjn <= fdmax; jjn++){ 
					   send_to_all(jjn, sockfd, ret_structr, &master ); 
					 } bbzero(ret_structr.messageStr); bbzero(ret_structr.agentUsername); 
   			   		//clean buffer+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	  //"""""""""""""""""
   }
   
struct member chekproc(struct member mainmemberob){
	FILE *statusfp;
	int wageunits;
	char chara,qr1[500],qr2[500],qr3[100],agentrank[21],rank_inference[100],wageunitstr[3],statusdata[1000],shstr[2];  
		sprintf(qr3,"select * from agents where agentUsername like '%c%c%c%c%c'",mainmemberob.agentUsername[0],mainmemberob.agentUsername[1],mainmemberob.agentUsername[2],mainmemberob.agentUsername[3],'%'); 
		 
		conn = mysql_init(NULL); 
		
		/*connecting to the database. NB: the function mysql_real_connect(..) returns 0 upon success and non zero when failed. */
		if(!(mysql_real_connect(conn,host,user,pass,dbname,mysqlport,unix_socket,flag))){ fprintf(stderr,"Error !! : %s\n",mysql_error(conn) ); 
		}else{  printf("\n chekproc: Connected successfully ..\n"); }  
		 
		if(mysql_query(conn,qr3)){printf("\n Select Query failed !! \n --------------------\n");
		}else{printf("\n Select Query successful.  \n-----------------------\n");}
		
		rset = mysql_store_result(conn); 
		while(row = mysql_fetch_row(rset)){ 
			strcpy(wageunitstr,row[6]);
			wageunits = atoi(wageunitstr);
			if(wageunits==7){
				strcpy(agentrank,"head agent");
				strcpy(rank_inference,"district not with highest enrollment ");
			}else if(wageunits==4){
				strcpy(agentrank,"agent");
				strcpy(rank_inference,"district not with highest enrollment ");
			}else if(wageunits==14){
				strcpy(agentrank,"superior head agent ");
				strcpy(rank_inference,"district with highest enrollment ");
			}else if(wageunits==8){
				strcpy(agentrank,"superior agent ");
				strcpy(rank_inference,"district with highest enrollment ");
			} 
			printf("%s\t%s\t%s\t%s\t%s*%s = %d\n",row[1],row[4],row[6],row[7],row[6],row[7],wageunits*atoi(row[7])); 
			sprintf(mainmemberob.messageStr," Name: = %s\n District: = %s (%s)\n Rank: = %s\n Wage: = %d \n",row[1],row[4],rank_inference,agentrank,wageunits*atoi(row[7]));
			if(strcmp(agentrank,"head agent")==0 || strcmp(agentrank,"superior head agent ")==0){ 
				statusfp = fopen("storage/app/status.txt", "r");
		    	if(statusfp != NULL){ 
		    		while((chara = fgetc(statusfp)) != EOF){ sprintf(&shstr[0],"%c",chara); strcat(statusdata,shstr);  } 
		    		strcat(mainmemberob.messageStr,"\n");
		    		strcat(mainmemberob.messageStr,statusdata);
		    	}//end if   
			}//end if 
		}// end while
		 
		mysql_free_result(rset);
		mysql_close(conn); 
		
		return mainmemberob;
  }


struct member getstmtproc(struct member mainmemberob){
	char qr1[500],qr2[500],qr3[100],agentrank[21];  
		sprintf(qr3,"select * from agents where agentUsername like '%c%c%c%c%c'",mainmemberob.agentUsername[0],mainmemberob.agentUsername[1],mainmemberob.agentUsername[2],mainmemberob.agentUsername[3],'%'); 
		 
		conn = mysql_init(NULL); 
		
		/*connecting to the database. NB: the function mysql_real_connect(..) returns 0 upon success and non zero when failed. */
		if(!(mysql_real_connect(conn,host,user,pass,dbname,mysqlport,unix_socket,flag))){ fprintf(stderr,"Error !! : %s\n",mysql_error(conn) ); 
		}else{  printf("\n getstmtproc: Connected successfully ..\n"); }  
		 
		if(mysql_query(conn,qr3)){printf("\n Select Query failed !! \n --------------------\n");
		}else{printf("\n Select Query successful.  \n-----------------------\n");}
		
		rset = mysql_store_result(conn); 
		while(row = mysql_fetch_row(rset)){ 
			printf("%s\t%s\t%s\t%s\t%s*%s = %d\n",row[1],row[4],row[6],row[7],row[6],row[7],(atoi(row[6])*atoi(row[7]))); 
			sprintf(mainmemberob.messageStr," Name: = %s\t District: = %s\t Wage: = %d \n",row[1],row[4],(atoi(row[6])*atoi(row[7])));
		}
		 
		mysql_free_result(rset);
		mysql_close(conn); 
		
		return mainmemberob;
}


struct member srchproc(struct member mainmemberob){
	MYSQL *sconn;
	sconn = mysql_init(NULL); 
	MYSQL_RES *resultset; 
	MYSQL_ROW rrow;
	int rows_affected; 
	static char *dbnamee = "recess_political_party";
	char querr1[500],querr2[500],querr2b[500],querr3[100];
	char tempstr[1200],commd[7],criterion[50],searchqry[300];
	char memberName[30],memberID[30],enrollmentDate[30],memberRecommender[30],memberGender[12],enrolledBy[30],districtName[30],recommendedMembers[30];
	char resultrow[400];
	strcpy(tempstr,mainmemberob.messageStr);
	strcpy(commd,strtok(tempstr," "));
	strcpy(criterion,strtok(NULL,"\0")); 
	strcpy(mainmemberob.messageStr,"");  
	strcpy(resultrow,"");
	printf("\n criterion : %s --------------------",criterion);
	sprintf(searchqry,"SELECT id,memberName,memberID,enrollmentDate,memberRecommender,memberGender,enrolledBy,districtName,recommendedMembers FROM members WHERE %s",criterion);
	printf("\nsearchqry = %s",searchqry);
	    /*connecting to the database. NB: the function mysql_real_connect(..) returns 0 upon success and non zero when failed. */
		if(!(mysql_real_connect(sconn,host,user,pass,dbnamee,mysqlport,unix_socket,flag))){ 
					fprintf(stderr,"Error !! : %s\n",mysql_error(sconn) ); 
		}else{  printf("\nRetrieving the searched items ... "); }  
	mysql_query(sconn,searchqry);
	resultset = mysql_store_result(sconn);
	while((rrow = mysql_fetch_row(resultset))!=NULL){   
		strcpy(memberName,rrow[1]);
		strcpy(memberID,rrow[2]);
		strcpy(enrollmentDate,rrow[3]);
		strcpy(memberRecommender,rrow[4]);
		strcpy(memberGender,rrow[5]);
		strcpy(enrolledBy,rrow[6]);
		strcpy(districtName,rrow[7]);
		strcpy(recommendedMembers,rrow[8]);
		sprintf(resultrow,"%c Name: ............. %s%c ID: ............... %s%c Date enrolled: .... %s%c Recommender: ...... %s%c Gender: ........... %s%c Enrolled By: ...... %s%c DistrictName: ..... %s%c RecommendedMembers: %s%c",'\n',memberName,'\n',memberID,'\n',enrollmentDate,'\n',memberRecommender,'\n',memberGender,'\n',enrolledBy,'\n',districtName,'\n',recommendedMembers,'\n');
		strcat(mainmemberob.messageStr,resultrow);
	} 
	mysql_free_result(resultset);  
	mysql_close(sconn); 
	return mainmemberob;
} 


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 void bbzero(char * strg){ for(int i=0;i<sizeof(strg);i++){ strg[i]='\0'; } }
 


