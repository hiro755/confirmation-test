namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use League\Csv\Writer;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // 検索・絞り込み・ページネーション
    }

    public function export(Request $request)
    {
        // CSV出力処理
    }

    public function show(Contact $contact)
    {
        // モーダル詳細表示用（JSON返すだけでも可）
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', '削除しました');
    }
}