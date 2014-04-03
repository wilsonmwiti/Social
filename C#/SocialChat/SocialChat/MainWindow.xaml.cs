using SocialChat.userControl;
using System;
using System.Collections.ObjectModel;
using System.Linq;
using System.Windows;
using SocialChatBusiness;
using System.Windows.Threading;
using System.Windows.Input;

namespace SocialChat
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        #region Attributs

        private readonly ObservableCollection<MessageUserControl> _messages;
        public ObservableCollection<MessageUserControl> Messages
        {
            get
            {
                return _messages;
            }
        }

        #endregion

        #region Construct

        /// <summary>
        /// Consttruct
        /// </summary>
        public MainWindow()
        {
            InitializeComponent();

            try
            {
                _messages = new ObservableCollection<MessageUserControl>();
                DataContext = _messages;

                var dispatcherTimer = new DispatcherTimer();
                dispatcherTimer.Tick += RefreshMessageListe;
                dispatcherTimer.Interval = new TimeSpan(0, 0, 1);
                dispatcherTimer.Start();
            }
            catch (Exception)
            {
            }
        }

        #endregion

        #region GUI Events

        /// <summary>
        /// Event launch when user click on "AddMEssage" Button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void AddMessage(object sender, RoutedEventArgs e)
        {
            var author = AuthorInput.Text;
            var message = MessageInput.Text;
            string errorMessage;

            if (!Business.Instance.InsertMessage(author, message, out errorMessage))
            {
                MessageBox.Show(errorMessage);
            }
            else
            {
                MessageInput.Text = "";
            }
        }

        /// <summary>
        /// Event launch when user presse a touch in input fields
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void EnterKeyPressed(object sender, KeyEventArgs e)
        {
            if (e.Key != Key.Enter) return;
            if (Equals(sender, AuthorInput))
            {
                MessageInput.Focus();
            }
            else if (Equals(sender, MessageInput))
            {
                AddMessage(sender, new RoutedEventArgs());
            }
        }

        #endregion

        #region Private Methods

        /// <summary>
        /// Get new messages and add them to the list;
        /// </summary>
        private void RefreshMessageListe(object sender, EventArgs e)
        {
            var newMessages = Business.Instance.GetNewMessages();
            foreach (var messsageUserControl in newMessages.Select(m => new MessageUserControl(m.author) { OriginalMessage = m.message }))
            {
                _messages.Add(messsageUserControl);
            }
        }

        #endregion 
    }
}
