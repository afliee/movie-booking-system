<?php 
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\MovieCategory;
use App\Models\Movies;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;

class AdminController extends Controller 
{
    public function index(Request $request) {
        // statistic money this week
        $statisticsThisWeek = $this->statisticsThisWeek();

        // statistic money each movie
        $statisticsEachMovie = $this->statisticsEachMovie();

        $statisticsThisMonth = $this->statisticsThisMonth();
        return view('admin.dashboard.index', [
            'statisticsThisWeek' => $statisticsThisWeek,
            'statisticsThisMonth' => $statisticsThisMonth,
            'statisticsEachMovie' => $statisticsEachMovie
        ]);
    }

    public function statisticsThisWeek() {
        // invoices, tickets, invoice_ticket
        // price_per_ticket, founded_date
        // sql total money this week
        $sql = "SELECT SUM(price_per_ticket) as total_money_this_week FROM invoices JOIN invoice_ticket ON invoices.id = invoice_ticket.invoice_id JOIN tickets ON invoice_ticket.ticket_id = tickets.id WHERE WEEK(founded_date) = WEEK(CURRENT_DATE())";
        $totalThisWeek = (new DB)->raw($sql);

        // get money from each day
        $sql = "SELECT SUM(price_per_ticket) as total_money_this_day, founded_date FROM invoices JOIN invoice_ticket ON invoices.id = invoice_ticket.invoice_id JOIN tickets ON invoice_ticket.ticket_id = tickets.id WHERE WEEK(founded_date) = WEEK(CURRENT_DATE()) GROUP BY founded_date";
        $totalThisWeekEachDay = (new DB)->raw($sql);
        
        // get date start and date end this week
        $date_start = date('d/m/Y', strtotime('sunday this week'));
        $date_end = date('d/m/Y', strtotime('saturday next week'));

        // get date start and date end this week
        // arrays of date in this week
        $dateThisWeek = array();
        // get date in this week
        for ($i = 0; $i < 7; $i++) {
            $dateThisWeek[] = date('d/m/Y', strtotime('sunday this week + ' . $i . ' days'));
        }

        // format founded_date to d/m/Y
        foreach ($totalThisWeekEachDay as $key => $value) {
            $totalThisWeekEachDay[$key]['founded_date'] = date('d/m/Y', strtotime($value['founded_date']));
        }

        // get money from each day
        $totalMoneyEachDay = array();
        foreach ($dateThisWeek as $date) {
            $totalMoneyEachDay[$date] = 0;
            foreach ($totalThisWeekEachDay as $value) {
                if ($date == $value['founded_date']) {
                    $totalMoneyEachDay[$date] = $value['total_money_this_day'];
                }
            }
        }

        $moneyEachDay = array();
        foreach ($totalMoneyEachDay as $key => $value) {
            $moneyEachDay[] = $value;
        }


        $result = [
            'dateStart' => $date_start,
            'dateEnd' => $date_end,
            'totalThisWeek' => $totalThisWeek[0]['total_money_this_week'],
            'dateThisWeek' => $dateThisWeek,
            'moneyEachDay' => $moneyEachDay,
        ];

        return $result;
    }

    public function statisticsThisMonth() {
        // get date start and date end this month
        $date_start = date('m/d/Y', strtotime('first day of this month'));
        $date_end = date('m/d/Y', strtotime('last day of this month'));
        // array of date in that month
        $dateThisMonth = array();
        // get number date of month
        $numberDateOfMonth = date('t', strtotime('first day of this month'));
        // get date in this month
        for ($i = 0; $i < $numberDateOfMonth; $i++) {
            $dateThisMonth[] = date('d/m/Y', strtotime($date_start . "+" . $i . ' day'));
        }

        // invoices, tickets, invoice_ticket
        // price_per_ticket, founded_date
        // sql total money this month
        
        $sql = "SELECT SUM(price_per_ticket) as total_money_this_month FROM invoices JOIN invoice_ticket ON invoices.id = invoice_ticket.invoice_id JOIN tickets ON invoice_ticket.ticket_id = tickets.id WHERE MONTH(founded_date) = MONTH(CURRENT_DATE())";
        $totalThisMonth = (new DB)->raw($sql);

        // get money from each day
        $sql = "SELECT SUM(price_per_ticket) as total_money_this_day, founded_date FROM invoices JOIN invoice_ticket ON invoices.id = invoice_ticket.invoice_id JOIN tickets ON invoice_ticket.ticket_id = tickets.id WHERE MONTH(founded_date) = MONTH(CURRENT_DATE()) GROUP BY founded_date";
        $totalThisMonthEachDay = (new DB)->raw($sql);
        
        $totalMoneyEachDay = array();
        foreach ($dateThisMonth as $date) {
            $totalMoneyEachDay[$date] = 0;
            foreach ($totalThisMonthEachDay as $value) {
                if ($date == date('d/m/Y', strtotime($value['founded_date']))) {
                    $totalMoneyEachDay[$date] = $value['total_money_this_day'];
                }
            }
        }

        $moneyEachDay = array();
        foreach ($totalMoneyEachDay as $key => $value) {
            $moneyEachDay[] = $value;
        }

        $result = [
            'dateStart' => $date_start,
            'dateEnd' => $date_end,
            'totalThisMonth' => $totalThisMonth[0]['total_money_this_month'],
            'dateThisMonth' => $dateThisMonth,
            'moneyEachDay' => $moneyEachDay,
        ];

        return $result;
    }

    public function statisticsEachMovie() {
        // get all movie
        $movies = (new Movies)->all();
        $tmp = [];
        // get total money and ticket each movie from table tickets and movies
        foreach ($movies as $movie) {
            $sql = "SELECT SUM(price_per_ticket) as total_money_each_movie FROM tickets JOIN movies ON tickets.movie_id = movies.id WHERE movies.id = {$movie['id']}";
            $totalEachMovie = (new DB)->raw($sql);
            $sql = "SELECT COUNT(*) as total_ticket_each_movie FROM tickets JOIN movies ON tickets.movie_id = movies.id WHERE movies.id = {$movie['id']}";
            $totalTicketEachMovie = (new DB)->raw($sql);
            $tmp[] = [
                'movie_name' => $movie['name'],
                'total_money_each_movie' => $totalEachMovie[0]['total_money_each_movie'],
                'total_ticket_each_movie' => $totalTicketEachMovie[0]['total_ticket_each_movie']
            ];
        }

        // get array name of movie
        // get money of movie
        // get ticket of movie
        $nameMovies = array();
        $moneyMovies = array();
        $ticketMovies = array();
        // dd($statisticsEachMovie[0]);
        foreach ($tmp as $value) {
            $nameMovies[] = $value['movie_name'];
            $moneyMovies[] = $value['total_money_each_movie'];
            $ticketMovies[] = $value['total_ticket_each_movie'];
        }

        $result = [
            'nameMovies' => $nameMovies,
            'moneyMovies' => $moneyMovies,
            'ticketMovies' => $ticketMovies
        ];

        return $result;
    }

}

?>