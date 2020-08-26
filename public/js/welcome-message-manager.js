var welcomeMessageManager={welcomeMessage:function(e){e.preventDefault(),e.stopPropagation();var s=$(e.target).siblings(".sure-delete"),a=s.find("p");s.css("display","block");var t=$(e.target).attr("data-id");a.first().click(function(){var e=$(this).closest(".message-item");$.ajax({type:"POST",url:"/vacancy/welcome-messages",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},data:{welcomeMessage:t},success:function(s){e.remove(),window.location.href="http://hrm.dev/vacancy/welcome-messages"}})}),a.last().click(function(){$(".sure-delete").css("display","none")})},init:function(){$(".delete-btn").on("click",this.welcomeMessages)},welcomeMessages:function(e){welcomeMessageManager.welcomeMessage(e)}};
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlbGNvbWUtbWVzc2FnZS1tYW5hZ2VyLmpzIl0sIm5hbWVzIjpbIndlbGNvbWVNZXNzYWdlTWFuYWdlciIsIndlbGNvbWVNZXNzYWdlIiwiZSIsInByZXZlbnREZWZhdWx0Iiwic3RvcFByb3BhZ2F0aW9uIiwic3VyZUJsb2NrIiwiJCIsInRhcmdldCIsInNpYmxpbmdzIiwieWVzQnV0dG9uIiwiZmluZCIsImNzcyIsImF0dHIiLCJmaXJzdCIsImNsaWNrIiwicGFyZW50QmxvY2siLCJ0aGlzIiwiY2xvc2VzdCIsImFqYXgiLCJ0eXBlIiwidXJsIiwiaGVhZGVycyIsIlgtQ1NSRi1UT0tFTiIsImRhdGEiLCJzdWNjZXNzIiwicmVtb3ZlIiwid2luZG93IiwibG9jYXRpb24iLCJocmVmIiwibGFzdCIsImluaXQiLCJvbiIsIndlbGNvbWVNZXNzYWdlcyIsImV2ZW50Il0sIm1hcHBpbmdzIjoiQUFDQSxHQUFJQSx3QkFFQUMsZUFBZ0IsU0FBU0MsR0FFckJBLEVBQUVDLGlCQUNGRCxFQUFFRSxpQkFFRixJQUFJQyxHQUFZQyxFQUFFSixFQUFFSyxRQUFRQyxTQUFTLGdCQUNqQ0MsRUFBWUosRUFBVUssS0FBSyxJQUUvQkwsR0FBVU0sSUFBSSxVQUFXLFFBQ3pCLElBQUlWLEdBQWlCSyxFQUFFSixFQUFFSyxRQUFRSyxLQUFLLFVBRXRDSCxHQUFVSSxRQUFRQyxNQUFNLFdBRXBCLEdBQUlDLEdBQWNULEVBQUVVLE1BQU1DLFFBQVEsZ0JBQ2xDWCxHQUFFWSxNQUNFQyxLQUFNLE9BQ05DLElBQUssNEJBQ0xDLFNBQ0lDLGVBQWdCaEIsRUFBRSwyQkFBMkJNLEtBQUssWUFFdERXLE1BQ0l0QixlQUFpQkEsR0FFckJ1QixRQUFTLFNBQVNELEdBQ2RSLEVBQVlVLFNBQ1pDLE9BQU9DLFNBQVNDLEtBQU8sK0NBS25DbkIsRUFBVW9CLE9BQU9mLE1BQU0sV0FFbkJSLEVBQUUsZ0JBQWdCSyxJQUFJLFVBQVcsV0FLekNtQixLQUFNLFdBRUZ4QixFQUFFLGVBQWV5QixHQUFHLFFBQVNmLEtBQUtnQixrQkFHdENBLGdCQUFpQixTQUFVQyxHQUV2QmpDLHNCQUFzQkMsZUFBZWdDIiwiZmlsZSI6IndlbGNvbWUtbWVzc2FnZS1tYW5hZ2VyLmpzIiwic291cmNlc0NvbnRlbnQiOlsiXG52YXIgd2VsY29tZU1lc3NhZ2VNYW5hZ2VyID0ge1xuXG4gICAgd2VsY29tZU1lc3NhZ2U6IGZ1bmN0aW9uKGUpXG4gICAge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG5cbiAgICAgICAgdmFyIHN1cmVCbG9jayA9ICQoZS50YXJnZXQpLnNpYmxpbmdzKCcuc3VyZS1kZWxldGUnKTtcbiAgICAgICAgdmFyIHllc0J1dHRvbiA9IHN1cmVCbG9jay5maW5kKCdwJyk7XG5cbiAgICAgICAgc3VyZUJsb2NrLmNzcygnZGlzcGxheScsICdibG9jaycpO1xuICAgICAgICB2YXIgd2VsY29tZU1lc3NhZ2UgPSAkKGUudGFyZ2V0KS5hdHRyKCdkYXRhLWlkJyk7XG5cbiAgICAgICAgeWVzQnV0dG9uLmZpcnN0KCkuY2xpY2soZnVuY3Rpb24gKClcbiAgICAgICAge1xuICAgICAgICAgICAgdmFyIHBhcmVudEJsb2NrID0gJCh0aGlzKS5jbG9zZXN0KCcubWVzc2FnZS1pdGVtJyk7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6IFwiUE9TVFwiLFxuICAgICAgICAgICAgICAgIHVybDogXCIvdmFjYW5jeS93ZWxjb21lLW1lc3NhZ2VzXCIsXG4gICAgICAgICAgICAgICAgaGVhZGVyczoge1xuICAgICAgICAgICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgZGF0YToge1xuICAgICAgICAgICAgICAgICAgICAnd2VsY29tZU1lc3NhZ2UnOndlbGNvbWVNZXNzYWdlXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKXtcbiAgICAgICAgICAgICAgICAgICAgcGFyZW50QmxvY2sucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gXCJodHRwOi8vaHJtLmRldi92YWNhbmN5L3dlbGNvbWUtbWVzc2FnZXNcIjtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICB5ZXNCdXR0b24ubGFzdCgpLmNsaWNrKGZ1bmN0aW9uICgpXG4gICAgICAgIHtcbiAgICAgICAgICAgICQoXCIuc3VyZS1kZWxldGVcIikuY3NzKCdkaXNwbGF5JywgJ25vbmUnKTtcbiAgICAgICAgfSk7XG5cbiAgICB9LFxuXG4gICAgaW5pdDogZnVuY3Rpb24gKClcbiAgICB7XG4gICAgICAgICQoXCIuZGVsZXRlLWJ0blwiKS5vbignY2xpY2snLCB0aGlzLndlbGNvbWVNZXNzYWdlcyk7XG4gICAgfSxcblxuICAgIHdlbGNvbWVNZXNzYWdlczogZnVuY3Rpb24gKGV2ZW50KXtcblxuICAgICAgICB3ZWxjb21lTWVzc2FnZU1hbmFnZXIud2VsY29tZU1lc3NhZ2UoZXZlbnQpO1xuICAgIH1cblxufTsiXX0=
